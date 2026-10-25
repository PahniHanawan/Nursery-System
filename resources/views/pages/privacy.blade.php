@extends('layouts.public')

@section('title', 'EU GDPR Privacy Policy & Data Rights - Little Sprouts Nursery')
@section('meta_description', 'Read our European GDPR and ePrivacy compliant privacy statement. Learn how Little Sprouts Nursery safeguards your family data and how to exercise your right to erasure.')

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-emerald-50/80 to-stone-50 py-16 border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs font-bold tracking-wider uppercase text-emerald-800 bg-emerald-100/70 px-3.5 py-1.5 rounded-full border border-emerald-200">
            Legal & Compliance
        </span>
        <h1 class="font-brand text-4xl sm:text-5xl font-bold text-slate-900">
            EU GDPR Privacy Policy
        </h1>
        <p class="text-slate-600 text-base max-w-2xl mx-auto">
            Our transparent commitment to protecting parent and child personal data in compliance with the General Data Protection Regulation (EU/UK GDPR) and the ePrivacy Directive.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-slate max-w-none prose-headings:font-brand">
        
        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-6 text-sm text-emerald-950 not-prose mb-10">
            <h3 class="font-bold text-base text-emerald-900 mb-1">Key Summary at a Glance</h3>
            <p class="leading-relaxed">
                Little Sprouts Nursery only collects information necessary to organize facility tours and respond to prospective enquiries. We never sell, monetize, or transfer your personal data to commercial third parties. You hold full rights to inspect, amend, or permanently anonymize your data at any time.
            </p>
        </div>

        <h2 class="text-2xl font-bold text-slate-900">1. Data Controller Identification</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
            The data controller responsible for the processing of your personal information collected through this website is:
            <br>
            <strong>Little Sprouts Nursery Limited</strong><br>
            14 Primrose Lane, Kensington, London, W8 7PT, United Kingdom<br>
            Registered in England & Wales &bull; Company Reg: 09841243<br>
            Data Protection Lead: Sarah Jenkins (<a href="mailto:privacy@littlesproutsnursery.test" class="text-emerald-700 font-semibold underline">privacy@littlesproutsnursery.test</a>)
        </p>

        <h2 class="text-2xl font-bold text-slate-900 mt-8">2. What Information We Collect & Why</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
            When you complete our <em>Book a Visit</em> or contact form, we collect the following categories of data:
        </p>
        <ul class="text-sm text-slate-600 space-y-1 list-disc list-inside">
            <li><strong>Parent / Guardian Name:</strong> To address you personally and greet you at our reception desk.</li>
            <li><strong>Email Address & Telephone Number:</strong> To confirm your requested visit tour slot and send notifications.</li>
            <li><strong>Child's Age or Date of Birth:</strong> To route your tour to the correct age-appropriate room (Baby, Toddler, or Preschool).</li>
            <li><strong>Estimated Start Date & Inquiries:</strong> To assess space availability in your requested room.</li>
            <li><strong>IP Address:</strong> Stored strictly for rate-limiting, firewall safety, and anti-spam verification.</li>
        </ul>

        <h2 class="text-2xl font-bold text-slate-900 mt-8">3. Legal Basis for Processing (GDPR Article 6)</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
            Under Article 6 of the General Data Protection Regulation (GDPR), processing is lawful on the following grounds:
        </p>
        <ul class="text-sm text-slate-600 space-y-1 list-disc list-inside">
            <li><strong>Explicit Consent (Article 6(1)(a)):</strong> You provide clear, unambiguous consent via our mandatory checkbox prior to submitting an enquiry.</li>
            <li><strong>Pre-Contractual Steps (Article 6(1)(b)):</strong> Taking necessary steps at your request prior to potentially entering into an enrollment contract.</li>
        </ul>

        <h2 class="text-2xl font-bold text-slate-900 mt-8">4. Data Retention Period</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
            Enquiry and visit tour submissions are retained in our database for a maximum of <strong>12 months</strong> following the requested visit date to facilitate follow-ups. If a family proceeds to formal enrollment, records are transferred into the statutory Ofsted pupil register. If a family does not enroll, records are securely archived or automatically anonymized.
        </p>

        <h2 class="text-2xl font-bold text-slate-900 mt-8">5. Your Legal Rights & The "Right to be Forgotten" (Article 17)</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
            Under GDPR, you retain the following enforceable rights regarding your information:
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 not-prose my-6 text-sm">
            <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200">
                <h4 class="font-bold text-slate-900">Right of Access (Art. 15)</h4>
                <p class="text-xs text-slate-600 mt-1">Request a copy of all personal details held about you at no charge.</p>
            </div>
            <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200">
                <h4 class="font-bold text-slate-900">Right to Erasure (Art. 17)</h4>
                <p class="text-xs text-slate-600 mt-1">Request permanent scrubbing of your name, phone, email, and IP address from our database records.</p>
            </div>
            <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200">
                <h4 class="font-bold text-slate-900">Right to Rectification (Art. 16)</h4>
                <p class="text-xs text-slate-600 mt-1">Request correction of inaccurate or outdated contact phone numbers or dates.</p>
            </div>
            <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200">
                <h4 class="font-bold text-slate-900">Right to Withdraw Consent (Art. 7)</h4>
                <p class="text-xs text-slate-600 mt-1">Withdraw your consent to be contacted at any time without penalty.</p>
            </div>
        </div>

        <p class="text-slate-600 text-sm leading-relaxed">
            To exercise your right to erasure, simply email <a href="mailto:privacy@littlesproutsnursery.test" class="text-emerald-700 font-semibold underline">privacy@littlesproutsnursery.test</a> with the subject line <em>"GDPR Erasure Request"</em>. Our admissions team can execute one-click data anonymization directly within our admin dashboard.
        </p>

        <h2 class="text-2xl font-bold text-slate-900 mt-8">6. Cookies and Tracking Technologies</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
            This website strictly utilizes necessary session and CSRF security tokens required for form submission and website operation. We do not load cross-site ad retargeting pixels or sell visitor identifiers. Your choice on our cookie banner is persisted locally in your browser storage.
        </p>

        <div class="mt-12 pt-6 border-t border-stone-200 text-xs text-slate-500">
            Policy Last Updated: October 2026 &bull; Compliant with EU Regulation 2016/679 (GDPR) and UK Data Protection Act 2018.
        </div>

    </div>
</section>
@endsection
