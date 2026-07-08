@extends('base')

@section('title', 'Exhibitions')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">

    <div class="max-w-7xl mx-auto">

        <!-- MAIN CARD -->
        <div class="rounded-xl sm:rounded-2xl md:rounded-[2rem] bg-gradient-to-br from-blue-50/80 via-purple-50/80 to-cyan-50/80 backdrop-blur-md border border-blue-200 p-4 sm:p-6 md:p-8 lg:p-10 shadow-xl overflow-hidden">

            <!-- HEADER -->
            <div class="mb-6 sm:mb-8">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-headline font-black text-zinc-950 mb-2 sm:mb-4 bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                    Exhibitions
                </h1>
            </div>

            <div class="flex flex-col lg:flex-row gap-6 sm:gap-8 md:gap-10 items-start">

                <!-- PDF ICON -->
               <div class="flex-shrink-0 mx-auto lg:mx-0 text-center w-full sm:w-auto">

                        <a href="{{ asset('I2Comsapp_Sponsorship_Proposal.pdf') }}"
                        target="_blank"
                        title="Sponsorship Brochure"
                        class="group block w-32 h-32 sm:w-40 sm:h-40 rounded-lg sm:rounded-2xl md:rounded-[2rem] bg-gradient-to-br from-blue-50 to-purple-50 border border-blue-100 shadow-inner flex items-center justify-center hover:shadow-xl transition-all duration-300 mx-auto">

                            <img src="{{ asset('images/pdf-icon.png') }}"
                                alt="Sponsorship Brochure"
                                class="w-20 h-20 sm:w-28 sm:h-28 object-contain group-hover:scale-105 transition-transform duration-300">

                        </a>

                        <p class="text-sm sm:text-base font-medium text-slate-700 leading-relaxed mt-3 sm:mt-5 max-w-xs mx-auto">
                            Click the PDF icon to download the official Sponsorship Brochure
                        </p>

                    </div>
                <!-- CONTENT -->
                <div class="flex-1 text-slate-800">


                    <p class="text-sm sm:text-base leading-7 sm:leading-8 mb-4 sm:mb-6 text-slate-700">
We invite businesses working in the field of Artificial Intelligence (AI) andMachine Learning (ML),to showcase their cutting-edge solutions and technologies at the  <strong> I2COMSAPP'26 International Conference on Artificial Intelligence and its Applications in the Age of Digital Transformation </strong>.
This event provides them with a unique platform to exhibit their AI-related products and services, connect with a diverse audience of experts, researchers, and practitioners, and explore potential collaborations and partnerships.
Your participation can help shape the future of AI and its real-world applicationsand contribute to the advancement of AI technologies that are driving positive change in various sectors.


                    <!-- CONTACTS -->
                    <div class="rounded-lg sm:rounded-2xl bg-white bg-opacity-70 border border-blue-300 p-4 sm:p-6">

                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 mb-3 sm:mb-4">
                            Contact Information
                        </h3>

                        <div class="space-y-2 sm:space-y-3 text-sm sm:text-base leading-relaxed">

                            <p>
                                <strong>International Contact:</strong>
                                <a href="mailto:chair@i2comsapp.org"
                                   class="text-blue-600 hover:text-blue-800 font-semibold">
                                    chair@i2comsapp.org
                                </a>
                            </p>

                            <p>
                                <strong>Local Contact:</strong>
                                <a href="mailto:cheikhtouradmohamedou@gmail.com"
                                   class="text-blue-600 hover:text-blue-800 font-semibold">
                                    cheikhtouradmohamedou@gmail.com
                                </a>
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>
@endsection
