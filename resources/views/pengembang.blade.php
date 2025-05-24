@extends('layouts.app')

@section('title', 'Pengembang - BlowMap')

@section('content')
    <style>
        .developer-header {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            color: white;
            padding: 60px 0 40px 0;
            border-radius: 0 0 24px 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .developer-title {
            font-size: 2.8rem;
            font-weight: 900;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        .developer-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        .developer-container {
            padding: 0 2rem 3rem 2rem;
        }

        .developer-card {
            border-radius: 22px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.08);
            padding: 38px 24px 28px 24px;
            margin-bottom: 36px;
            text-align: center;
            height: 100%;
            border: 3.5px solid transparent;
            position: relative;
            overflow: visible;
            background: #fff;
            transition:
                box-shadow 0.32s cubic-bezier(.21, .6, .36, 1),
                border 0.3s cubic-bezier(.21, .6, .36, 1),
                transform 0.32s cubic-bezier(.21, .6, .36, 1),
                background 0.5s cubic-bezier(.21, .6, .36, 1);
            cursor: pointer;
            z-index: 1;
            /* Floating animation */
            animation: floatCard 4s ease-in-out infinite alternate;
        }

        @keyframes floatCard {
            0% {
                transform: translateY(0) scale(1);
            }

            100% {
                transform: translateY(-10px) scale(1.03);
            }
        }

        .developer-card:hover {
            transform: translateY(-18px) scale(1.07) rotate(-1.5deg);
            box-shadow: 0 24px 80px 0 rgba(52, 152, 219, 0.19), 0 4px 18px rgba(44, 62, 80, 0.15);
            z-index: 2;
            background: rgba(255, 255, 255, 0.96);
        }

        /* Holographic/glassmorphism effect on hover */
        .developer-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 22px;
            z-index: 0;
            opacity: 0;
            transition: opacity 0.4s;
            pointer-events: none;
        }

        .developer-card:hover::before {
            opacity: 1;
        }

        /* Card Variasi */
        .card-elga {
            border-color: #3498db;
            background: linear-gradient(120deg, #e3f0ff 0%, #f5f7fa 100%);
        }

        .card-elga:hover::before {
            background: linear-gradient(120deg, rgba(52, 152, 219, 0.13) 0%, rgba(255, 255, 255, 0.8) 100%);
        }

        .card-bibit {
            border-color: #f1c40f;
            background: linear-gradient(135deg, #fffbe3 0%, #fff0c3 100%);
        }

        .card-bibit:hover::before {
            background: linear-gradient(135deg, rgba(241, 196, 15, 0.13) 0%, rgba(255, 255, 255, 0.85) 100%);
        }

        .card-habiel {
            border-color: #8e44ad;
            background: linear-gradient(135deg, #f3e9ff 0%, #e1d0f7 100%);
        }

        .card-habiel:hover::before {
            background: linear-gradient(135deg, rgba(142, 68, 173, 0.13) 0%, rgba(255, 255, 255, 0.85) 100%);
        }

        .card-fuad {
            border-color: #27ae60;
            background: linear-gradient(135deg, #e3fff2 0%, #c3ffe2 100%);
        }

        .card-fuad:hover::before {
            background: linear-gradient(135deg, rgba(39, 174, 96, 0.13) 0%, rgba(255, 255, 255, 0.85) 100%);
        }

        .card-nua {
            border-color: #e74c3c;
            background: linear-gradient(135deg, #ffeaea 0%, #ffd4d4 100%);
        }

        .card-nua:hover::before {
            background: linear-gradient(135deg, rgba(231, 76, 60, 0.13) 0%, rgba(255, 255, 255, 0.85) 100%);
        }

        /* Ring warna unik */
        .photo-ring {
            display: inline-block;
            padding: 7px;
            border-radius: 50%;
            margin-bottom: 14px;
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            box-shadow: 0 4px 16px rgba(52, 152, 219, 0.15);
            transition: box-shadow 0.3s;
        }

        .developer-card:hover .photo-ring {
            box-shadow: 0 8px 32px rgba(52, 152, 219, 0.25);
        }

        .card-bibit .photo-ring {
            background: linear-gradient(135deg, #f1c40f 0%, #e67e22 100%);
        }

        .card-habiel .photo-ring {
            background: linear-gradient(135deg, #8e44ad 0%, #6c3483 100%);
        }

        .card-fuad .photo-ring {
            background: linear-gradient(135deg, #27ae60 0%, #16a085 100%);
        }

        .card-nua .photo-ring {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        }

        .developer-photo {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.13);
            background: #f5f7fa;
            transition: filter 0.3s, box-shadow 0.3s;
            z-index: 1;
            position: relative;
        }

        .developer-card:hover .developer-photo {
            filter: brightness(1.10) drop-shadow(0 2px 12px rgba(44, 62, 80, 0.18));
            box-shadow: 0 6px 18px rgba(44, 62, 80, 0.18);
        }

        .developer-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 2px;
            letter-spacing: 0.1px;
            z-index: 2;
            position: relative;
        }

        .developer-nim {
            font-size: 1.08rem;
            color: #7f8c8d;
            margin-bottom: 14px;
            z-index: 2;
            position: relative;
        }

        .developer-badge {
            position: absolute;
            top: -1.2rem;
            left: -1.2rem;
            background: #3498db;
            border-radius: 0 0 18px 0;
            padding: 7px 22px 7px 22px;
            font-size: 1.02rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: 0.7px;
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.10);
            z-index: 2;
            transition: background 0.3s;
        }

        .card-bibit .developer-badge {
            background: #f1c40f;
            color: #fff;
        }

        .card-habiel .developer-badge {
            background: #8e44ad;
        }

        .card-fuad .developer-badge {
            background: #27ae60;
        }

        .card-nua .developer-badge {
            background: #e74c3c;
        }

        /* Instagram Reveal */
        .developer-social {
            margin-top: 18px;
            opacity: 0;
            transform: translateY(25px) scale(0.95);
            pointer-events: none;
            transition: all 0.38s cubic-bezier(.16, .84, .44, 1);
        }

        .developer-card:hover .developer-social {
            opacity: 1;
            transform: translateY(0) scale(1.08);
            pointer-events: auto;
        }

        .developer-social a {
            color: #b2becd;
            font-size: 1.7rem;
            margin: 0 6px;
            transition: color 0.22s, transform 0.22s, background 0.22s;
            display: inline-block;
            background: #fff;
            border-radius: 50%;
            padding: 7px 13px;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.10);
            position: relative;
        }

        .developer-social a:hover {
            color: #fff;
            background: linear-gradient(135deg, #e1306c 0%, #fd1d1d 100%);
            transform: scale(1.19) rotate(-8deg);
            box-shadow: 0 6px 18px rgba(225, 48, 108, 0.18);
        }

        /* Animasi masuk */
        .developer-card {
            opacity: 0;
            transform: translateY(30px) scale(0.97);
            animation: cardFadeIn 0.8s cubic-bezier(.16, .84, .44, 1) forwards;
        }

        .developer-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .developer-card:nth-child(2) {
            animation-delay: 0.22s;
        }

        .developer-card:nth-child(3) {
            animation-delay: 0.34s;
        }

        .developer-card:nth-child(4) {
            animation-delay: 0.46s;
        }

        .developer-card:nth-child(5) {
            animation-delay: 0.58s;
        }

        @keyframes cardFadeIn {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (max-width: 600px) {
            .developer-card {
                padding: 22px 6px 18px 6px;
            }

            .developer-header {
                padding: 36px 0 18px 0;
            }

            .developer-title {
                font-size: 1.5rem;
            }
        }
    </style>

    <div class="developer-header text-center">
        <h1 class="developer-title">Pengembang BlowMap</h1>
        <p class="developer-subtitle">Tim yang membangun dan mengembangkan aplikasi ini</p>
    </div>

    <div class="container developer-container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="developer-card card-elga">
                    <span class="developer-badge">Backend</span>
                    <span class="photo-ring">
                        <img src="{{ asset('images/Elga.jpg') }}" alt="Elga Firmantara" class="developer-photo">
                    </span>
                    <h3 class="developer-name">Elga Firmantara</h3>
                    <div class="developer-nim">H1101231004</div>
                    <div class="developer-social">
                        <a href="https://www.instagram.com/_zktk__/" target="_blank" title="Instagram Elga"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="developer-card card-bibit">
                    <span class="developer-badge">UI/UX</span>
                    <span class="photo-ring">
                        <img src="{{ asset('images/bibit.jpg') }}" alt="Bibit Frisca Amelia" class="developer-photo">
                    </span>
                    <h3 class="developer-name">Bibit Frisca Amelia</h3>
                    <div class="developer-nim">H1101231008</div>
                    <div class="developer-social">
                        <a href="https://www.instagram.com/bibitfrsca/" target="_blank" title="Instagram Bibit"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="developer-card card-habiel">
                    <span class="developer-badge">DevOps</span>
                    <span class="photo-ring">
                        <img src="{{ asset('images/Habil.png') }}" alt="Habiel Alvarezi" class="developer-photo">
                    </span>
                    <h3 class="developer-name">Habiel Alvarezi</h3>
                    <div class="developer-nim">H1101231016</div>
                    <div class="developer-social">
                        <a href="https://www.instagram.com/hblalvrz/" target="_blank" title="Instagram Habiel"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="developer-card card-fuad">
                    <span class="developer-badge">Data Engineer</span>
                    <span class="photo-ring">
                        <img src="{{ asset('images/fuad2.jpg') }}" alt="Khoirul Fuad" class="developer-photo">
                    </span>
                    <h3 class="developer-name">Khoirul Fuad</h3>
                    <div class="developer-nim">H1101231036</div>
                    <div class="developer-social">
                        <a href="https://www.instagram.com/fart_18/" target="_blank" title="Instagram Fuad"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="developer-card card-nua">
                    <span class="developer-badge">Frontend</span>
                    <span class="photo-ring">
                        <img src="{{ asset('images/nua.jpg') }}" alt="Nicholas Benua Audlen Putra" class="developer-photo">
                    </span>
                    <h3 class="developer-name">Nicholas Benua Audlen Putra</h3>
                    <div class="developer-nim">H1101231042</div>
                    <div class="developer-social">
                        <a href="https://www.instagram.com/ad_ptra1/" target="_blank" title="Instagram Nicholas"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
