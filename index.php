<?php
session_start();

$uploadDir = __DIR__ . "/uploads/";

$images = glob($uploadDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
sort($images);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ElectroBee - Slider Horizontal</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; margin-top: 20px; }
        .slider-container {
            max-width: 900px;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            border: 2px solid #ccc;
            border-radius: 10px;
        }
        .slider-track {
            display: flex;
            transition: transform 0.3s ease-in-out;
        }
        .slider-track img {
            width: 200px;
            margin: 5px;
            border-radius: 5px;
        }
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0,0,0,0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
            border-radius: 5px;
        }
        .prev { left: 10px; }
        .next { right: 10px; }
    </style>
</head>
<body>

<h1>ElectroBee - Slider Horizontal</h1>

<div class="slider-container">
    <button class="prev">❮</button>
    <div class="slider-track">
        <?php foreach($images as $imgPath): 
            $imgUrl = "uploads/" . basename($imgPath);
        ?>
            <img src="<?= $imgUrl ?>" alt="Foto">
        <?php endforeach; ?>
    </div>
    <button class="next">❯</button>
</div>

<script>
    const track = document.querySelector('.slider-track');
    const slides = document.querySelectorAll('.slider-track img');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const slideWidth = slides[0].offsetWidth + 10; 
    let position = 0;

    next.addEventListener('click', () => {
        if(position > -(slideWidth * (slides.length - 4))) { 
            position -= slideWidth;
            track.style.transform = `translateX(${position}px)`;
        }
    });

    prev.addEventListener('click', () => {
        if(position < 0) {
            position += slideWidth;
            track.style.transform = `translateX(${position}px)`;
        }
    });
</script>

</body>
</html>
