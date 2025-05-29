<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ - Car Rental</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Reset & Fonts */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            padding: 40px 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 36px;
            color: #222;
        }

        .faq-container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .faq-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .faq-question {
            font-size: 18px;
            font-weight: 600;
            padding: 15px;
            cursor: pointer;
            transition: background 0.3s;
            position: relative;
            user-select: none;
        }

        .faq-question:hover {
            background-color: #f0f0f0;
        }

        .faq-answer {
            padding: 0 15px 15px 15px;
            display: none;
            color: #555;
            font-size: 16px;
        }

        .faq-question::after {
            content: '+';
            position: absolute;
            right: 20px;
            font-size: 24px;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question::after {
            content: '-';
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 28px;
            }

            .faq-question {
                font-size: 16px;
            }

            .faq-answer {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
    <div style="text-align: center; margin-bottom: 30px;">
    <a href="/QuickRide/client/indexClient.php" style="text-decoration: none; background-color: #007BFF; color: white; padding: 10px 20px; border-radius: 5px;">← Back to Home</a>
    <?php else: ?>
        <div style="text-align: center; margin-bottom: 30px;">
    <a href="index.php" style="text-decoration: none; background-color:rgb(45, 106, 176); color: white; padding: 10px 20px; border-radius: 5px;">← Back to Home</a>
    <?php endif; ?>

</div>

    <h1>Frequently Asked Questions</h1>
    <div class="faq-container">

        <div class="faq-item">
            <div class="faq-question">How do I rent a car?</div>
            <div class="faq-answer">Simply browse our car listings, choose your desired vehicle, and click "Rent Now". Follow the steps to confirm your booking.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What documents are required?</div>
            <div class="faq-answer">You must provide a valid driving license, national ID or passport, and a valid payment method.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Can I cancel my reservation?</div>
            <div class="faq-answer">Yes, cancellations are allowed up to 24 hours before pickup time at no charge. Later cancellations may incur a fee.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What payment methods are accepted?</div>
            <div class="faq-answer">Only D17 for now.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Is fuel included in the rental price?</div>
            <div class="faq-answer">No, fuel is not included. Cars should be returned with the same fuel level as at pickup.</div>
        </div>

    </div>

    <script>
        const items = document.querySelectorAll('.faq-item');

        items.forEach(item => {
            item.querySelector('.faq-question').addEventListener('click', (event) => {
                event.preventDefault(); // Prevent any default browser behavior
                item.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
