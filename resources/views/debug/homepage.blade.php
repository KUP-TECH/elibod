<x-basecomponent>

    <!-- resources/views/yourview.blade.php -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Partitioned Layout</title>
      <style>
        * {
          box-sizing: border-box;
          margin: 0;
          padding: 0;
        }

        body {
          font-family: Arial, sans-serif;
          background-color: #d3d3d3;
          display: flex;
          flex-direction: column;
        }

        .header {
          height: 70px;
          display: flex;
          align-items: center;
          justify-content: left;
          background-color: #6eabc7;
          color: white;
        }

        .logo-container {
          display: flex;
          align-items: center;
          gap: 1px;
        }

        .logo-container img {
          border-radius: 100%;
          width: 100px;
          height: 100px;
        }

        .logo-text {
          font-size: 28px;
          font-weight: bold;
          color: #3a6899;
        }

        .search {
          height: 50px;
          display: flex;
          align-items: center;
          justify-content: center;
          background-color: #6eabc7;
        }

        .search input {
          padding: 10px;
          font-size: 16px;
          width: 50%;
          border: none;
          border-radius: 8px;
          outline: none;
        }

        .card-container {
          display: flex;
          justify-content: center;
          padding: 10px;
          gap: 20px;
        }

        .column {
          display: flex;
          flex-direction: column;
          gap: 20px;
        }

        .item-wrapper {
          text-decoration: none;
          display: flex;
          flex-direction: column;
          align-items: center;
        }

        .grid-item {
          background-color: #e0e0e0;
          border-radius: 12px;
          width: 175px;
          height: 170px;
          overflow: hidden;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .card-image {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        .label {
          margin-top: 6px;
          font-size: 15px;
          color: #333;
          font-weight: 600;
          text-align: center;
        }
      </style>
    </head>
    <body>

      <div class="header">
        <div class="logo-container">
          <img src="{{ asset('assets/image/Logo/tf.png') }}" alt="Logo">
          <div class="logo-text">Elibod</div>
        </div>
      </div>

      <div class="search">
        <input type="text" placeholder="Search..." />
      </div>

      <div class="card-container">
        <div class="column">
          <a href="{{ url('/your-target-page/1') }}" class="item-wrapper">
            <div class="grid-item">
              <img src="{{ asset('assets\Cantilan\Agila White Beach\IMG_1313(1).JPG') }}" alt="Card 1" class="card-image">
            </div>
            <div class="label">Cantilan</div>
          </a>
          <a href="{{ url('/your-target-page/2') }}" class="item-wrapper">
            <div class="grid-item">
              <img src="{{ asset('assets\Carmen\Bikayan Falls\IMG_1477.JPG') }}" alt="Card 2" class="card-image">
            </div>
            <div class="label">Carmen</div>
          </a>
          <a href="{{ url('/your-target-page/3') }}" class="item-wrapper">
            <div class="grid-item">
              <img src="{{ asset('assets\Carrascal\Agas-as\IMG_1297.JPG') }}" alt="Card 3" class="card-image">
            </div>
            <div class="label">Carrascal</div>
          </a>
        </div>
        <div class="column">
          <a href="{{ url('/your-target-page/4') }}" class="item-wrapper">
            <div class="grid-item">
              <img src="{{ asset('assets\Cortes\Bakwitan Cave\IMG_1515.JPG') }}" alt="Card 4" class="card-image">
            </div>
            <div class="label">Cortes</div>
          </a>
          <a href="{{ url('/your-target-page/5') }}" class="item-wrapper">
            <div class="grid-item">
              <img src="{{ asset('assets\Lanuza\Aceyoung Paradise\IMG_1584.JPG') }}" alt="Card 5" class="card-image">
            </div>
            <div class="label">Lanuza</div>
          </a>
          <a href="{{ url('/your-target-page/6') }}" class="item-wrapper">
            <div class="grid-item">
              <img src="{{ asset('assets\Madrid\Bayogo Cove\IMG_1650.JPG') }}" alt="Card 6" class="card-image">
            </div>
            <div class="label">Madrid</div>
          </a>
        </div>
      </div>

    </body>
    </html>

</x-basecomponent>
