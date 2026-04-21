@extends('base')

@section('title', 'Keynote Speakers')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Static Speakers content from user-provided HTML -->
        <div id="wb_Speakers">
            <div id="Speakers">
                <div class="row">
                    <div class="col-1" style="background-color: #ADFF2F;padding: 10px;">
                        <div id="wb_Text25"><span style="color:#000000;font-family:Anton;font-size:32px;letter-spacing:5.07px;">Keynote Speakers </span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Example static speaker card (user provided many entries in HTML) -->
        <div id="wb_LayoutGrid14" class="mb-8">
            <div class="card" id="wb_Card5" style="display:flex;width:100%;text-align:center;z-index:171;">
                <div id="Card5-card-body">
                    <img alt="" height="340" id="Card5-card-item0" src="{{ asset('images/Habib_Zaidi.jpg') }}" title="Habib Zaidi" width="220" />
                    <div id="Card5-card-item1">Prof. Habib Zaidi</div>
                    <div id="Card5-card-item2">Head of PET Instrumentation & Neuroimaging Laboratory at Geneva University Hospital, <br /> and Professor at the medical school of Geneva University, Switzerland. <br /></div>
                    <hr id="Card5-card-item3" />
                    <div id="Card5-card-item4"><a href="http://www.pinlab.ch/Habib/" target="_blank">Read More</a></div>
                </div>
            </div>
        </div>

        <!-- More static speaker entries can be added similarly following the provided HTML -->

    </div>
</main>
@endsection
