<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/Semar.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/Semar.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <meta name="theme-color" content="#000000">

    
    <!-- Dynamic Title & Description -->
    <title>@yield('title', 'Rental Mobil Semarang Terpercaya | Semar Rent Car')</title>
    <meta name="description" content="@yield('meta_description', 'Semar Rent Car adalah jasa rental mobil Semarang terpercaya sejak 2008. Sewa mobil lepas kunci atau dengan driver, armada lengkap, harga transparan.')">
    <meta name="keywords" content="rental mobil semarang, sewa mobil semarang, rental mobil lepas kunci semarang, semar rent car">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- OG / Twitter Card bisa juga yield -->
    <meta property="og:title" content="@yield('og_title', 'Rental Mobil Semarang Terpercaya | Semar Rent Car')">
    <meta property="og:description" content="@yield('og_description', 'Semar Rent Car - Jasa rental mobil Semarang sejak 2008')">
    <meta property="og:image" content="@yield('og_image', asset('image/Semar.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Rental Mobil Semarang Terpercaya | Semar Rent Car')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Semar Rent Car - Jasa rental mobil Semarang sejak 2008')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('image/Semar.png'))">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: "Roboto", sans-serif;
            background-color: #0B0B0B;
        }

        .snap-scroll {
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
        }
        .snap-scroll::-webkit-scrollbar { display: none; }
        .snap-item { scroll-snap-align: start; flex-shrink: 0; }
    </style>

    <!-- Structured Data: Organization & CarRental -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CarRental",
        "name": "Semar Rent Car",
        "image": "https://semarrentcar.com/image/Semar.png",
        "description": "Rental mobil Semarang terpercaya sejak 2008. Lepas kunci atau dengan driver.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Gedung Astagina AKPOL, Jl. Sultan Agung",
            "addressLocality": "Semarang",
            "addressRegion": "Jawa Tengah",
            "postalCode": "50232",
            "addressCountry": "ID"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "-7.0183138",
            "longitude": "110.4158095"
        },
        "telephone": "+62-813-4576-5427",
        "priceRange": "$$",
        "openingHours": "Mo-Su 08:00-20:00",
        "url": "https://semarrentcar.com",
        "sameAs": [
            "https://www.instagram.com/semarrentcar",
            "https://wa.me/6281345765427"
        ]
    }
    </script>
    @endverbatim
</head>