@extends('layouts.app')

@section('title', 'Contact — BuildCares')
@section('description', 'Get in touch with BuildCares for a free quote on your architectural drawing project.')

@section('content')

{{-- Page Header --}}
<section class="relative pt-40 pb-20 overflow-hidden" style="background-color:#0f172a;">
    <div class="absolute inset-0 opacity-[0.06] pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 1440 300" preserveAspectRatio="xMidYMid slice">
            <defs>
                <pattern id="cg" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="#2563eb" stroke-width="0.6"/></pattern>
                <pattern id="cg-lg" width="200" height="200" patternUnits="userSpaceOnUse"><path d="M 200 0 L 0 0 0 200" fill="none" stroke="#2563eb" stroke-width="1"/></pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#cg)"/>
            <rect width="100%" height="100%" fill="url(#cg-lg)"/>
        </svg>
    </div>
    <div class="absolute top-0 left-0 w-1 h-full" style="background-color:#2563eb;"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px" style="background:linear-gradient(to right, rgba(37,99,235,0.5), rgba(37,99,235,0.1), transparent);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="section-label">Reach Out</div>
        <h1 class="section-title-light">Contact Us</h1>
        <p style="color:#64748b;" class="max-w-xl">Ready to start your project? Get in touch for a free consultation and quote. We respond to all enquiries within a few hours.</p>
    </div>
</section>

{{-- Contact section --}}
<section class="section-padding" style="background-color:#f8fafc;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- Info --}}
            <div class="space-y-6">
                <div>
                    <div class="section-label">Get in Touch</div>
                    <h2 class="section-title" style="font-size:1.75rem; margin-bottom:1rem;">We're Here to Help</h2>
                    <p class="text-sm leading-relaxed" style="color:#64748b;">Describe your project and we'll come back with a tailored quote and timeline. No obligation, completely free.</p>
                </div>

                <div class="space-y-3">
                    <div class="flex items-start gap-4 bg-white p-4 border" style="border-color:#e2e8f0; border-left:2px solid #2563eb;">
                        <div class="w-9 h-9 flex items-center justify-center flex-shrink-0" style="background:#eff6ff;">
                            <svg class="w-4 h-4" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold uppercase tracking-widest mb-1" style="color:#94a3b8;">Email</div>
                            <a href="mailto:anwar@buildcares.com" class="text-sm font-semibold transition-colors hover:text-blue-600" style="color:#1e293b;">anwar@buildcares.com</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 bg-white p-4 border" style="border-color:#e2e8f0; border-left:2px solid #2563eb;">
                        <div class="w-9 h-9 flex items-center justify-center flex-shrink-0" style="background:#eff6ff;">
                            <svg class="w-4 h-4" style="color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold uppercase tracking-widest mb-1" style="color:#94a3b8;">Working Hours</div>
                            <span class="text-sm font-semibold" style="color:#1e293b;">Mon–Sun &nbsp; 9AM – 10PM</span>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <div class="text-xs font-bold uppercase tracking-widest mb-3" style="color:#94a3b8;">Follow Us</div>
                    <div class="flex gap-2">
                        @foreach([['X/Twitter','M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.743l7.73-8.835L1.254 2.25H8.08l4.259 5.631zm-1.161 17.52h1.833L7.084 4.126H5.117z'],['LinkedIn','M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'],['YouTube','M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z'],['Instagram','M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z']] as [$label, $path])
                        <a href="#" aria-label="{{ $label }}" class="w-9 h-9 bg-white flex items-center justify-center transition-all hover:bg-blue-600 hover:border-blue-600 hover:text-white border" style="border-color:#e2e8f0; color:#94a3b8;">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div class="lg:col-span-2">
                @if(session('success'))
                <div class="mb-6 p-4 flex items-start gap-3" style="background:#f0fdf4; border:1px solid #bbf7d0; color:#166534;">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <div><div class="font-bold mb-1">Message Sent!</div><div class="text-sm opacity-80">{{ session('success') }}</div></div>
                </div>
                @endif

                <div class="bg-white p-8 border" style="border-color:#e2e8f0; border-top:2px solid #2563eb;">
                    <h2 class="font-bold text-2xl mb-6" style="color:#0f172a;">Send a Message</h2>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="block text-xs font-bold uppercase tracking-widest mb-2" style="color:#94a3b8;">Full Name <span style="color:#2563eb;">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="input-dark @error('name') !border-blue-400 @enderror" placeholder="John Smith">
                                @error('name')<p class="text-xs mt-1" style="color:#2563eb;">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-widest mb-2" style="color:#94a3b8;">Email <span style="color:#2563eb;">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="input-dark @error('email') !border-blue-400 @enderror" placeholder="john@example.com">
                                @error('email')<p class="text-xs mt-1" style="color:#2563eb;">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label for="phone" class="block text-xs font-bold uppercase tracking-widest mb-2" style="color:#94a3b8;">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="input-dark" placeholder="+44 7700 900000">
                            </div>
                            <div>
                                <label for="service" class="block text-xs font-bold uppercase tracking-widest mb-2" style="color:#94a3b8;">Service</label>
                                <select id="service" name="service" class="input-dark">
                                    <option value="">Select a service...</option>
                                    <option value="garage-conversion" {{ old('service', request('service')) === 'garage-conversion' ? 'selected' : '' }}>Garage Conversion</option>
                                    <option value="loft-conversion" {{ old('service', request('service')) === 'loft-conversion' ? 'selected' : '' }}>Loft Conversion</option>
                                    <option value="extension" {{ old('service', request('service')) === 'extension' ? 'selected' : '' }}>Extension</option>
                                    <option value="new-build" {{ old('service', request('service')) === 'new-build' ? 'selected' : '' }}>New Build</option>
                                    <option value="outbuilding" {{ old('service', request('service')) === 'outbuilding' ? 'selected' : '' }}>Outbuilding</option>
                                    <option value="internal-changes" {{ old('service', request('service')) === 'internal-changes' ? 'selected' : '' }}>Internal Changes</option>
                                    <option value="other" {{ old('service', request('service')) === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-xs font-bold uppercase tracking-widest mb-2" style="color:#94a3b8;">Subject <span style="color:#2563eb;">*</span></label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="input-dark @error('subject') !border-blue-400 @enderror" placeholder="Planning drawings for rear extension">
                            @error('subject')<p class="text-xs mt-1" style="color:#2563eb;">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="message" class="block text-xs font-bold uppercase tracking-widest mb-2" style="color:#94a3b8;">Message <span style="color:#2563eb;">*</span></label>
                            <textarea id="message" name="message" rows="6" class="input-dark resize-none @error('message') !border-blue-400 @enderror" placeholder="Please describe your project — type of property, location, approximate size, and what drawings you need...">{{ old('message') }}</textarea>
                            @error('message')<p class="text-xs mt-1" style="color:#2563eb;">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="btn-gold w-full justify-center py-4 text-sm">
                            Send Message
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>
                        <p class="text-xs text-center" style="color:#94a3b8;">We typically respond within a few hours during working hours.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Process --}}
<section class="py-16 border-t bg-white" style="border-color:#e2e8f0;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <div class="section-label justify-center">How It Works</div>
            <h2 class="section-title">Our Simple Process</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([['Send Enquiry','Fill in the form above or WhatsApp us with your project details.','1'],['Free Consultation','We discuss your requirements and provide a fixed-price quote.','2'],['Drawing Production','Our team produces your drawings to UK planning/building control standards.','3'],['Delivery','Receive your completed drawings ready for submission, typically in 3–5 days.','4']] as [$title, $desc, $num])
            <div class="text-center reveal">
                <div class="w-14 h-14 flex items-center justify-center mx-auto mb-4 relative" style="border:2px solid #2563eb; background:#eff6ff;">
                    <span class="font-bold text-xl" style="color:#2563eb;">{{ $num }}</span>
                    <div class="absolute -top-1.5 -right-1.5 w-3.5 h-3.5" style="background-color:#2563eb;"></div>
                </div>
                <h3 class="font-bold text-sm mb-2 uppercase tracking-tight" style="color:#0f172a;">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color:#64748b;">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
