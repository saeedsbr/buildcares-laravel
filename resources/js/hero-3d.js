// BuildCares hero 3D — wireframe house + ambient blueprint field
import * as THREE from 'three';

const PRIMARY = 0x2563eb;
const ACCENT  = 0x60a5fa;
const SOFT    = 0x93c5fd;

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// ── Helpers ────────────────────────────────────────────────────────────────
function makeWireframe(geometry, color, opacity = 1) {
    const edges = new THREE.EdgesGeometry(geometry, 1);
    const mat = new THREE.LineBasicMaterial({
        color,
        transparent: opacity < 1,
        opacity,
    });
    return new THREE.LineSegments(edges, mat);
}

function makeLineLoop(points, color, opacity = 1) {
    const geo = new THREE.BufferGeometry().setFromPoints(points);
    const mat = new THREE.LineBasicMaterial({
        color,
        transparent: opacity < 1,
        opacity,
    });
    return new THREE.LineLoop(geo, mat);
}

// ── House: a detailed wireframe single-storey house with pitched roof ──────
function buildHouse() {
    const group = new THREE.Group();

    // Main body (walls)
    const body = makeWireframe(new THREE.BoxGeometry(4, 2.2, 3), PRIMARY, 0.95);
    body.position.y = 1.1;
    group.add(body);

    // Pitched roof — triangular prism via ExtrudeGeometry
    const roofShape = new THREE.Shape();
    roofShape.moveTo(-2.15, 0);
    roofShape.lineTo(2.15, 0);
    roofShape.lineTo(0, 1.4);
    roofShape.closePath();

    const roofGeo = new THREE.ExtrudeGeometry(roofShape, {
        depth: 3.15,
        bevelEnabled: false,
    });
    roofGeo.translate(0, 2.2, -1.575);
    const roof = makeWireframe(roofGeo, PRIMARY, 0.95);
    group.add(roof);

    // Door (front face, slightly recessed using a thin box for visible outline)
    const door = makeWireframe(new THREE.BoxGeometry(0.6, 1.2, 0.02), ACCENT, 0.95);
    door.position.set(0, 0.6, 1.501);
    group.add(door);

    // Window frames — front face
    const winGeo = new THREE.BoxGeometry(0.7, 0.7, 0.02);
    [-1.2, 1.2].forEach((x) => {
        const w = makeWireframe(winGeo, ACCENT, 0.9);
        w.position.set(x, 1.4, 1.501);
        group.add(w);
        // Mullion cross
        const cross = new THREE.BufferGeometry().setFromPoints([
            new THREE.Vector3(x, 1.05, 1.505),
            new THREE.Vector3(x, 1.75, 1.505),
            new THREE.Vector3(x - 0.35, 1.4, 1.505),
            new THREE.Vector3(x + 0.35, 1.4, 1.505),
        ]);
        const lines = new THREE.LineSegments(
            cross,
            new THREE.LineBasicMaterial({ color: SOFT, transparent: true, opacity: 0.7 })
        );
        group.add(lines);
    });

    // Windows — side faces
    [[-2.001, 1, 0, Math.PI / 2], [2.001, 1, 0, Math.PI / 2]].forEach(([x, y, z, ry]) => {
        const sideWin = makeWireframe(new THREE.BoxGeometry(0.9, 0.6, 0.02), ACCENT, 0.85);
        sideWin.position.set(x, 1.4, z);
        sideWin.rotation.y = ry;
        group.add(sideWin);
    });

    // Chimney
    const chimney = makeWireframe(new THREE.BoxGeometry(0.4, 1.2, 0.4), PRIMARY, 0.9);
    chimney.position.set(1.1, 3.2, -0.3);
    group.add(chimney);

    // Floor / ground plate (blueprint grid)
    const gridSize = 10;
    const grid = new THREE.GridHelper(gridSize, 20, SOFT, SOFT);
    grid.material.transparent = true;
    grid.material.opacity = 0.18;
    grid.position.y = -0.01;
    group.add(grid);

    // Outline footprint plate
    const plate = makeLineLoop(
        [
            new THREE.Vector3(-2.5, 0, -2),
            new THREE.Vector3( 2.5, 0, -2),
            new THREE.Vector3( 2.5, 0,  2),
            new THREE.Vector3(-2.5, 0,  2),
        ],
        PRIMARY,
        0.6
    );
    group.add(plate);

    // Glow halo: a second pass of wireframe slightly scaled up with low opacity
    const halo = makeWireframe(new THREE.BoxGeometry(4.06, 2.26, 3.06), ACCENT, 0.18);
    halo.position.y = 1.1;
    group.add(halo);

    return group;
}

// ── Scene 1: Prominent rotating house on the right ─────────────────────────
export function initHeroHouse(container) {
    if (!container || prefersReducedMotion) return;

    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(38, 1, 0.1, 100);
    camera.position.set(7.5, 5, 9.5);
    camera.lookAt(0, 1.2, 0);

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);
    renderer.domElement.style.cssText = 'width:100%;height:100%;display:block;';

    const house = buildHouse();
    scene.add(house);

    // Floating tiny cubes orbiting the house
    const orbiters = new THREE.Group();
    for (let i = 0; i < 6; i++) {
        const size = 0.18 + Math.random() * 0.15;
        const cube = makeWireframe(new THREE.BoxGeometry(size, size, size), ACCENT, 0.55);
        const a = (i / 6) * Math.PI * 2;
        const r = 4.2 + Math.random() * 1.3;
        cube.position.set(Math.cos(a) * r, 1.2 + Math.random() * 2.4, Math.sin(a) * r);
        cube.userData = { angle: a, radius: r, speed: 0.15 + Math.random() * 0.15, ySpeed: 0.3 + Math.random() * 0.4, yPhase: Math.random() * Math.PI * 2 };
        orbiters.add(cube);
    }
    scene.add(orbiters);

    // Mouse parallax target
    const mouse = { x: 0, y: 0, tx: 0, ty: 0 };
    const onMove = (e) => {
        const rect = container.getBoundingClientRect();
        mouse.tx = ((e.clientX - rect.left) / rect.width - 0.5) * 2;
        mouse.ty = ((e.clientY - rect.top) / rect.height - 0.5) * 2;
    };
    window.addEventListener('mousemove', onMove, { passive: true });

    const resize = () => {
        const w = container.clientWidth;
        const h = container.clientHeight;
        renderer.setSize(w, h, false);
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
    };
    resize();
    const ro = new ResizeObserver(resize);
    ro.observe(container);

    // Pause when off-screen for perf
    let visible = true;
    const io = new IntersectionObserver(
        ([entry]) => { visible = entry.isIntersecting; },
        { threshold: 0.01 }
    );
    io.observe(container);

    const clock = new THREE.Clock();
    function tick() {
        const t = clock.getElapsedTime();
        const dt = clock.getDelta();

        if (visible) {
            house.rotation.y = t * 0.18;
            orbiters.children.forEach((c) => {
                c.userData.angle += c.userData.speed * 0.01;
                c.position.x = Math.cos(c.userData.angle) * c.userData.radius;
                c.position.z = Math.sin(c.userData.angle) * c.userData.radius;
                c.position.y = 1.6 + Math.sin(t * c.userData.ySpeed + c.userData.yPhase) * 1.1;
                c.rotation.x = t * 0.5;
                c.rotation.y = t * 0.3;
            });

            // Smooth mouse parallax
            mouse.x += (mouse.tx - mouse.x) * 0.04;
            mouse.y += (mouse.ty - mouse.y) * 0.04;
            camera.position.x = 7.5 + mouse.x * 1.2;
            camera.position.y = 5 + mouse.y * 0.6;
            camera.lookAt(0, 1.2, 0);

            renderer.render(scene, camera);
        }

        requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
}

// ── Scene 2: Ambient particle field + drifting wireframe shapes (full hero) ─
export function initAmbientField(container) {
    if (!container || prefersReducedMotion) return;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, 1, 0.1, 100);
    camera.position.z = 14;

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);
    renderer.domElement.style.cssText = 'width:100%;height:100%;display:block;';

    // Particles
    const PARTICLE_COUNT = 280;
    const positions = new Float32Array(PARTICLE_COUNT * 3);
    const speeds = new Float32Array(PARTICLE_COUNT);
    for (let i = 0; i < PARTICLE_COUNT; i++) {
        positions[i * 3 + 0] = (Math.random() - 0.5) * 30;
        positions[i * 3 + 1] = (Math.random() - 0.5) * 18;
        positions[i * 3 + 2] = (Math.random() - 0.5) * 20;
        speeds[i] = 0.1 + Math.random() * 0.4;
    }
    const partGeo = new THREE.BufferGeometry();
    partGeo.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    const partMat = new THREE.PointsMaterial({
        color: PRIMARY,
        size: 0.06,
        transparent: true,
        opacity: 0.55,
        sizeAttenuation: true,
    });
    const particles = new THREE.Points(partGeo, partMat);
    scene.add(particles);

    // Drifting wireframe shapes (small cubes + thin frames)
    const drifters = new THREE.Group();
    for (let i = 0; i < 14; i++) {
        const geo = Math.random() > 0.5
            ? new THREE.BoxGeometry(
                0.3 + Math.random() * 0.6,
                0.3 + Math.random() * 0.6,
                0.3 + Math.random() * 0.6
            )
            : new THREE.PlaneGeometry(
                0.6 + Math.random() * 0.8,
                0.4 + Math.random() * 0.6
            );
        const shape = makeWireframe(geo, i % 3 === 0 ? PRIMARY : ACCENT, 0.32);
        shape.position.set(
            (Math.random() - 0.5) * 24,
            (Math.random() - 0.5) * 14,
            (Math.random() - 0.5) * 14
        );
        shape.userData = {
            rx: (Math.random() - 0.5) * 0.4,
            ry: (Math.random() - 0.5) * 0.4,
            drift: 0.05 + Math.random() * 0.08,
            phase: Math.random() * Math.PI * 2,
        };
        drifters.add(shape);
    }
    scene.add(drifters);

    // Mouse parallax
    const mouse = { x: 0, y: 0, tx: 0, ty: 0 };
    const onMove = (e) => {
        mouse.tx = (e.clientX / window.innerWidth - 0.5) * 2;
        mouse.ty = (e.clientY / window.innerHeight - 0.5) * 2;
    };
    window.addEventListener('mousemove', onMove, { passive: true });

    const resize = () => {
        const w = container.clientWidth;
        const h = container.clientHeight;
        renderer.setSize(w, h, false);
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
    };
    resize();
    const ro = new ResizeObserver(resize);
    ro.observe(container);

    let visible = true;
    const io = new IntersectionObserver(
        ([entry]) => { visible = entry.isIntersecting; },
        { threshold: 0.01 }
    );
    io.observe(container);

    const clock = new THREE.Clock();
    function tick() {
        const t = clock.getElapsedTime();

        if (visible) {
            // Drift particles upward (subtle)
            const pos = partGeo.attributes.position.array;
            for (let i = 0; i < PARTICLE_COUNT; i++) {
                pos[i * 3 + 1] += speeds[i] * 0.004;
                if (pos[i * 3 + 1] > 9) pos[i * 3 + 1] = -9;
            }
            partGeo.attributes.position.needsUpdate = true;

            // Rotate drifters
            drifters.children.forEach((c) => {
                c.rotation.x += c.userData.rx * 0.005;
                c.rotation.y += c.userData.ry * 0.005;
                c.position.y += Math.sin(t * c.userData.drift + c.userData.phase) * 0.002;
            });

            // Camera parallax
            mouse.x += (mouse.tx - mouse.x) * 0.03;
            mouse.y += (mouse.ty - mouse.y) * 0.03;
            camera.position.x = mouse.x * 0.8;
            camera.position.y = -mouse.y * 0.5;
            camera.lookAt(0, 0, 0);

            renderer.render(scene, camera);
        }

        requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
}
