@extends('base')

@section('title', 'Exhibitions')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-surface-container-low">
    <div class="max-w-6xl mx-auto">
        <div class="mb-16 rounded-[2rem] bg-white/80 border border-outline p-12 shadow-[0_32px_80px_rgba(13,42,148,0.08)] backdrop-blur-xl">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full bg-blue-100 text-blue-800 text-sm font-semibold px-4 py-2 mb-4">Exhibitions</span>
                <h1 class="text-6xl font-headline font-black tracking-tighter mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Exhibitions & Accommodation</h1>
                <p class="text-xl text-slate-600 font-medium">Showcase your AI and ML solutions at I2COMSAPP 2026 and access special accommodation offers arranged for conference attendees.</p>
            </div>
        </div>

        <div class="grid gap-12">
            <div class="bg-white rounded-[2rem] border border-outline p-10 shadow-xl">
                <div class="flex flex-col lg:flex-row gap-10 items-start">
                    <div class="flex-shrink-0">
                        <a href="{{ asset('I2Comsapp_Sponsorship_Proposal.pdf') }}" target="_blank" title="Sponsorship Brochure" class="block w-32 h-32 rounded-3xl bg-gradient-to-br from-blue-50 to-purple-50 shadow-inner flex items-center justify-center">
                            <img src="{{ asset('images/pdf-icon.png') }}" alt="Sponsorship Brochure" width="122" height="122" class="w-28 h-28 object-contain">
                        </a>
                    </div>
                    <div class="text-base leading-8 text-slate-800">
                        <p class="font-semibold mb-4">Click the icon to download the Sponsorship Brochure</p>
                        <p class="mb-4">We invite businesses working in the field of Artificial Intelligence (AI) and machine learning (ML) to showcase their cutting-edge solutions and technologies at the "I2COMSAPP International Conference on Artificial Intelligence and its Applications in the Age of Digital Transformation". This event provides a unique platform to exhibit AI-related products and services, connect with experts, researchers, and practitioners, and explore collaborations and partnerships.</p>
                        <p class="mb-4">Your participation can help shape the future of AI and its real-world applications, contributing to the advancement of technologies that drive positive change across sectors.</p>
                        <p class="font-semibold">For proposals, please send email to :</p>
                        <p class="leading-relaxed">1) International Contact (from outside Mauritania): <a href="mailto:chair@i2comsapp.org" class="text-blue-600 hover:text-blue-800">chair@i2comsapp.org</a><br>2) Local Contact (from inside Mauritania): <a href="mailto:cheikhtouradmohamedou@gmail.com" class="text-blue-600 hover:text-blue-800">cheikhtouradmohamedou@gmail.com</a></p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50/80 via-purple-50/80 to-cyan-50/80 backdrop-blur-md rounded-[2rem] shadow-xl overflow-hidden p-10 text-gray-900 border border-blue-200">
                <div class="mb-8">
                    <h2 class="text-5xl font-headline font-black tracking-tight">Accommodation</h2>
                </div>
                <div class="text-base leading-8 text-slate-200 mb-10">
                    <p class="mb-4">For those coming from abroad, the organization committee has discussed promotional accommodation fees for the three hotels shown below. For more details, please contact conference organizers:</p>
                    <p class="mb-2">• Dr. Dr. Med Mahmoud El Benany at: <a href="mailto:senhourry@yahoo.com" class="underline text-blue-600">senhourry@yahoo.com</a></p>
                    <p>• Dr. Med El Moustapha El Arby at: <a href="mailto:medmhdbennannu@gmail.com" class="underline text-blue-600">medmhdbennannu@gmail.com</a></p>
                </div>

                <div class="grid gap-8 lg:grid-cols-3 text-slate-900">
                    <div class="bg-white rounded-[2rem] overflow-hidden shadow-2xl text-center p-6">
                        <h3 class="font-bold text-2xl mb-4">Sunset Hotel</h3>
                        <img src="{{ asset('images/sunset-hotel.jpg') }}" alt="Sunset Hotel" class="mx-auto mb-4 rounded-3xl object-cover h-64 w-full">
                        <p class="text-lg font-semibold mb-3">Single room: 110 euros<br>Double room: 125 euros</p>
                        <a href="http://www.sunsethotel.mr/" target="_blank" rel="noopener noreferrer" class="inline-block text-blue-600 font-semibold hover:text-blue-800">Hotel Website</a>
                    </div>
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl text-center p-6">
                        <h3 class="font-bold text-2xl mb-4">Nouakchott Hotel</h3>
                        <img src="{{ asset('images/nouakchott-hotel.jpg') }}" alt="Nouakchott Hotel" class="mx-auto mb-4 rounded-3xl object-cover h-64 w-full">
                        <p class="text-lg font-semibold mb-3">Single room: 109 euros<br>Double room: 136 euros</p>
                        <a href="http://www.nouakchotthotel.com/" target="_blank" rel="noopener noreferrer" class="inline-block text-blue-600 font-semibold hover:text-blue-800">Hotel Website</a>
                    </div>
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl text-center p-6">
                        <h3 class="font-bold text-2xl mb-4">Fasq Hotel</h3>
                        <img src="{{ asset('images/fasq-hotel.jpg') }}" alt="Fasq Hotel" class="mx-auto mb-4 rounded-3xl object-cover h-64 w-full">
                        <p class="text-lg font-semibold mb-3">Single room: 225 euros</p>
                        <a href="http://www.fasqhotels.com/" target="_blank" rel="noopener noreferrer" class="inline-block text-blue-600 font-semibold hover:text-blue-800">Hotel Website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
