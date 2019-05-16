<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link rel="stylesheet" href="{{asset('vendor/photoswipe/photoswipe.css')}}">
<link rel="stylesheet" href="{{asset('vendor/photoswipe/default-skin/default-skin.css')}}">

<style>
.my-gallery {
  width: 100%;
  float: left;
}
.my-gallery img {
  width: 100%;
  height: auto;
}
.my-gallery figure {
  display: block;
  float: left;
  margin: 0 5px 5px 0;
  width: 150px;
}
.my-gallery figcaption {
  display: none;
}
</style>
</head>
<body>

        <h2>First gallery:</h2>

        <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
      
          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="https://farm3.staticflickr.com/2567/5697107145_a4c2eaa0cd_o.jpg" itemprop="contentUrl" data-size="1024x1024">
                <img src="https://farm3.staticflickr.com/2567/5697107145_3c27ff3cd1_m.jpg" itemprop="thumbnail" alt="Image description" />
            </a>
                                                <figcaption itemprop="caption description">Image caption  1</figcaption>
                                                
          </figure>
      
          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_b.jpg" itemprop="contentUrl" data-size="964x1024">
                <img src="https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_m.jpg" itemprop="thumbnail" alt="Image description" />
            </a>
            <figcaption itemprop="caption description">Image caption 2</figcaption>
          </figure>
      
          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_b.jpg" itemprop="contentUrl" data-size="1024x683">
                <img src="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_m.jpg" itemprop="thumbnail" alt="Image description" />
            </a>
            <figcaption itemprop="caption description">Image caption 3</figcaption>
          </figure>
      
          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="https://farm6.staticflickr.com/5023/5578283926_822e5e5791_b.jpg" itemprop="contentUrl" data-size="1024x768">
                <img src="https://farm6.staticflickr.com/5023/5578283926_822e5e5791_m.jpg" itemprop="thumbnail" alt="Image description" />
            </a>
            <figcaption itemprop="caption description">Image caption 4</figcaption>
          </figure>
      
      
        </div>
      
      <h2>Second gallery:</h2>
      
        <div class="my-gallery" itemscope itemtype="{{url()->current()}}">
            @foreach ($fotos as $foto)
          <figure itemprop="associatedMedia" itemscope itemtype="{{url()->current()}}">
            <a href="{{asset($foto->foto)}}" itemprop="contentUrl" data-size="100x100">
                <img src="{{asset($foto->foto)}}" itemprop="thumbnail" alt="{{$foto->deskripsi}}" style="object-fit: cover; width: 100%; height: 200px" />
            </a>
            <figcaption itemprop="caption description">{{$foto->deskripsi}}</figcaption>
          </figure>
          @endforeach
      
        </div>
      
      
      
      <!-- Root element of PhotoSwipe. Must have class pswp. -->
    @include('pagination.swipe')

    <script src="{{asset('vendor/photoswipe/photoswipe.min.js')}}"></script> 
    <script src="{{asset('vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script> 
    <script src="{{asset('vendor/photoswipe/swipe.js')}}"></script>
</body>
</html>