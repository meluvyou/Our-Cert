<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICATION</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            position: relative;
        }

        /* Add watermark using a pseudo-element */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/images/Gui-Logo.png'); /* Path to your logo */
            background-size: 300px; /* Adjust size as needed */
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.1; /* Adjust transparency (0.1 = very transparent, 1 = opaque) */
            z-index: -1; /* Ensure it stays behind the content */
            pointer-events: none; /* Prevent interaction with the watermark */
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white border-4 border-gray-300 shadow-lg max-w-4xl mx-auto p-10 rounded-lg">
        <!-- Left Image -->
        <div class="w-full md:w-1/2 mb-10 md:mb-0">
            <img src="/images/Gui-Logo.png" alt="Illustration" class="w-full max-w-md mx-auto">
        </div>
        <!-- Centered Text -->
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-800">Republic of the Philippines</h1>
            <h2 class="text-2xl font-semibold text-gray-700">Province of Cebu</h2>
            <h3 class="text-xl font-medium text-gray-600">City of Danao</h3>
            <hr class="my-6 border-gray-400">
            <h1 class="text-3xl font-bold text-gray-800">OFFICE OF THE PUNONG BARANGAY</h1>
            <h1 class="text-3xl font-bold text-gray-800">Guinacot, Danao City</h1
            <hr class="my-6 border-gray-500">
            <h1 class="text-3xl font-bold text-gray-800">CERTIFICATION</h1>
        </div>

        <div class="mt-8 text-justify text-gray-700">
            <p class="mt-4">
                To Whom It May Concern:
            <p>
                        This is to certify that,<span class="font-semibold">[Resident's Full Name]</span>,<span class="font-semibold">[old]</span>years old,<span class="font-semibold">[He/She]</span> is a
                bonafide resident of this Barangay with postal address at Sitio<span class="font-semibold">[purok]</span>, Barangay
                Guinacot, Danao City and has been living in this Barangay for almost <span class="font-semibold">[#?]</span> years.
            </p>        
            <p class="mt-4">
                        This certification is issued upon his/her request to attest the residency in the BARANGAY
                    in connection with his/her application for<span class="font-semibold">[Purpose]</span>.
            </p>
            <p class="mt-4">
                    Done in this<span class="font-semibold">[Day]</span> day of <span class="font-semibold">[Month]</span>, 2025 at BARANGAY GUINACOT, Danao City, Cebu,
                    Philippines.
            </p>
        </div>
        <!-- Right text -->
        <div class="flex justify-between items-center mt-10">
            <div class="text-center">
                <p class="text-gray-600">_________________________</p>
                <p class="text-gray-600">Barangay Captain</p>
            </div>
        </div>  

    <div>
</body>
</html>