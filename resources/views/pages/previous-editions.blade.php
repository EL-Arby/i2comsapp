@extends('base')

@section('title', 'Previous Editions - I2COMSAPP 2026')

@section('content')
<main>
        <!-- Photo & Video Gallery -->
        <section class="gallery-section" aria-labelledby="gallery-heading">
            <div class="previous-links">
                <h6 class="previous-title">Explore Previous Editions</h6>
                
                
                <div class="links-container">

    <ul class="edition-list">

        <!-- SECOND EDITION -->
        <li class="edition-item">
            <h5 class="edition-title">
                Second Edition (I2COMSAPP 2025)
            </h5>

            <a href="{{ asset('/backup25/index.html') }}"
               target="_blank"
               class="btn-link website">
                🌐 Website
            </a>

            <br><br>

            <a href="https://link.springer.com/conference/i2comsapp"
               target="_blank"
               class="btn-link springer">
                📚 Springer Proceedings
            </a>
        </li>

        <!-- FIRST EDITION -->
        <li class="edition-item">
            <h5 class="edition-title">
                First Edition (I2COMSAPP 2024)
            </h5>

            <a href="{{ asset('/Backup2024/i2comsapp.org/index.html') }}"
               target="_blank"
               class="btn-link website">
                🌐 Website
            </a>

            <br><br>

            <a href="https://link.springer.com/conference/i2comsapp"
               target="_blank"
               class="btn-link springer">
                📚 Springer Proceedings
            </a>
        </li>

    </ul>

</div>
                
                
                
            </div>
            <h6 id="gallery-heading" class="gallery-title">  Photo & Video Gallery</h6>
            <div class="gallery-grid">
                <!-- Photos -->
                <div class="gallery-item">
                    <img src="{{ asset('images/imgs/G5.jpg') }}" alt="Event photo 1">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/imgs/G2.jpg') }}" alt="Event photo 2">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/imgs/G3.jpg') }}" alt="Event photo 3">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/imgs/G4.jpg') }}" alt="Event photo 4">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/imgs/g1.jpg') }}" alt="Event photo 4">
                </div>

                <!-- Videos -->
                <div class="gallery-item video-item">
                    <video controls>
                        <source src="{{ asset('images/imgs/I2COMSAPP.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <!--<div class="gallery-item video-item">-->
                    <!--<video controls>-->
                    <!--    <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">-->
                <!--        Your browser does not support the video tag.-->
                <!--    </video>-->
                <!--</div>-->
            </div>
        </section>
    </div>
</main>
@endsection

@push('styles')
<style>

.edition-block {
    text-align: center;
    margin-bottom: 20px;
}

.edition-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #006b34;
    margin-bottom: 15px;
}
    .previous-links {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .edition-list {
    list-style-type: disc;
    padding-left: 20px;
}

.edition-item {
    margin-bottom: 40px;
}

.edition-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #006b34;
    margin-bottom: 15px;
}

    .previous-title {
        font-size: 2em;
        font-weight: bold;
        color: #000000;
        margin-bottom: 20px;
    }

    .links-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .btn-link {
        display: inline-block;
        padding: 15px 30px;
        background: linear-gradient(135deg, #f5fbf2 0%, #e4eae1 100%);
        border: 2px solid #006b34;
        border-radius: 10px;
        text-decoration: none;
        color: #006b34;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-link:hover {
        background: #006b34;
        color: white;
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    /* Gallery Section Styles */
    .gallery-section {
        padding: 60px 20px;
        background: linear-gradient(135deg, #f5fbf2 0%, #e4eae1 100%);
        margin: 40px 0;
        scroll-margin-top: 5.5rem;
    }

    .gallery-title {
        text-align: center;
        font-size: 2em;
        font-weight: bold;
        color: #000000;
        margin-bottom: 40px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        background: white;
    }

    .gallery-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .gallery-item img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }

    .gallery-item video {
        width: 100%;
        height: 300px;
        display: block;
        background: #000;
    }

    .video-item {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .gallery-title {
            font-size: 1.8em;
        }

        .links-container {
            flex-direction: column;
            align-items: center;
        }
    }
</style>
@endpush
