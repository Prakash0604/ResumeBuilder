<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accurate Resume Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .resume {
            background-color: #fff;
            max-width: 900px;
            margin: 40px auto;
            padding: 40px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .resume .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .resume .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            position: relative;
            padding-bottom: 10px;
        }

        .resume .header h1::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100px;
            height: 2px;
            background-color: #333;
        }

        .resume .header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .resume .summary {
            margin-bottom: 30px;
        }

        .resume .section-title {
            font-size: 18px;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
            margin-bottom: 10px;
            padding-bottom: 5px;
        }

        .resume .experience,
        .resume .education,
        .resume .skills {
            margin-bottom: 20px;
        }

        .resume .experience-item,
        .resume .education-item {
            margin-bottom: 20px;
        }

        .resume .experience-item h5,
        .resume .education-item h5 {
            font-size: 16px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .resume .experience-item .date,
        .resume .education-item .date {
            float: right;
            font-size: 14px;
            color: #888;
        }

        .resume .experience-item p,
        .resume .education-item p {
            font-size: 14px;
            color: #555;
        }

        .resume .skills ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .resume .skills ul li {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .contact-info ul {
            list-style-type: none;
            padding: 0;
        }

        .contact-info ul li {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .contact-info ul li i {
            margin-right: 8px;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="resume">
        <!-- Header Section with Name, Title and Image -->
        <div class="header row">
            <div class="col-md-8">
                <h1>BECKETT STONE</h1>
                <p>Professional Title</p>
            </div>
            <div class="col-md-4 text-end">
                <img src="https://via.placeholder.com/120" alt="Profile Picture">
            </div>
        </div>

        <div class="row">
            <!-- Contact Section -->
            @include('Pages.Contact')

            <!-- Summary Section -->
            @include('Pages.Summary')

        </div>

        <div class="row">
            <!-- Education Section -->
            <div class="col-md-4">
                @include('Pages.Education')
                @include('Pages.Skill' )
            </div>

            <!-- Experience Section -->
            <div class="col-md-8">
               @include('Pages.Experience')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
