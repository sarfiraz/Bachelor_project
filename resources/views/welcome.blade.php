@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        .container1 {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        #intro-title {
            font-size: 2.5rem;
            margin-top: 1rem;
        }

        #intro-paragraph {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-top: 2rem;
            text-align: justify;
        }

        #downloadButton {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            animation: changeColor 2s linear infinite;
        }

        @keyframes changeColor {
            0% {
                background-color: #4CAF50;
            }
            50% {
                background-color: #1976D2;
            }
            100% {
                background-color: #4CAF50;
            }
        }
        .image-bg{
            background: rgb(230,250,255);
            background: linear-gradient(90deg, rgba(230,250,255,1) 0%, rgba(242,242,242,1) 100%);
        }
    </style>
    <title>Introduction</title>
</head>

<body class="image-bg">
<div class="container1">
    <h1 id="intro-title">Website Builder from Templates</h1>
    <p id="intro-paragraph">
        Are you looking to create a stunning website without the hassle of coding from scratch? Look no further! Our Website Builder from Templates provides an intuitive and user-friendly solution to build your dream website.
        <br><br>
        With a wide range of professionally designed templates, you can easily customize your website to match your unique style and brand. Whether you're a business owner, blogger, or creative professional, our templates have got you covered.
        <br><br>
        Simply choose a template that suits your needs, and start customizing it with our easy-to-use drag-and-drop editor. Add your own text, images, and videos to create engaging and visually appealing web pages. Customize colors, fonts, and layouts to make your website truly stand out.
        <br><br>
        Our Website Builder from Templates also offers powerful features like responsive design, SEO optimization, and integration with popular tools and services. You can easily create a website that looks great on any device and attracts visitors from search engines.
        <br><br>
        Don't waste time and effort building a website from scratch. Get started with our Website Builder from Templates today and bring your online presence to life!
    </p>
    <div class="text-center">
        <button id="downloadButton">Download Introduction</button>
    </div>
</div>
<script>
    // Function to handle the button click event
    function downloadAsPDF() {
        // Create a new jsPDF instance
        const doc = new jspdf.jsPDF();

        // Set font size for the title
        doc.setFontSize(24); // Adjust the font size as needed

        // Set font weight for the title
        doc.setFont("helvetica", "bold");

        // Get the inner text of the paragraph
        const paragraphTitle = document.getElementById('intro-title').innerText;
        const paragraphText = document.getElementById('intro-paragraph').innerText;

        // Get the width of the PDF page
        const pageWidth = doc.internal.pageSize.getWidth();

        // Calculate the x-coordinate for center alignment
        const x = (pageWidth - doc.getStringUnitWidth(paragraphTitle) - 100) / 2;

        // Add the title text to the PDF
        doc.text(paragraphTitle, x, 20); // Adjust the y-coordinate as needed

        // Set font size for the paragraph text
        doc.setFontSize(12); // Adjust the font size as needed
        doc.setFont("Helvetica", "normal");

        // Split the paragraph into lines
        const lines = doc.splitTextToSize(paragraphText, pageWidth - 20);

        // Add the lines of text to the PDF with proper padding and line breaks
        doc.text(10, 40, lines); // Adjust the coordinates as needed

        // Save the PDF file
        doc.save('introduction.pdf');
    }

    // Attach an event listener to the button
    const downloadButton = document.getElementById('downloadButton');
    downloadButton.addEventListener('click', downloadAsPDF);
</script>
</body>

</html>
@endsection
