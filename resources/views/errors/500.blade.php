<style>
    .container {
      height: 200px;
      position: relative;
      border: 3px solid green;
    }
    
    .vertical-center {
      margin: 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }
    </style>

<div class="container">
    <div class="vertical-center">
    <img src="{{asset('images/maintenance.jpg')}}" alt="" style="width: 100%; max-width: 800px;">
    </div>
</div>

