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
