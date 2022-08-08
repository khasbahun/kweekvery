<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175518274-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175518274-2');
</script>
     <meta charset="UTF-8">
    <meta name="description" content="We deliver fresh organic fruits, vegetables and other products at your doorstep in and around Gangtok, Sikkim."/>
    <meta name="developer" content="YoungSikkim - www.youngsikkim.in"/>
    @include('partials.header')
    <style>
            

        body {
       
          
          font-family: "Comic Sans MS", cursive, sans-serif;
          line-height: 1.5;
          font-size: 13px;
        }
    .clear { clear: both; height: 60px; }
    .gap { clear: both; height: 20px; }
    </style>
    
    

</head>
<body style="background-color: white">
    <div id="app">
        @include('partials.navbar')

        <div class="container">
        <div class="clear"></div>
            @include('partials.messages')
            
            @yield('content')
        </div>
    </div>
     <div class="gap"></div>
    <footer class="footer">
         <div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example">
         <a href="/" class="btn  button-inactive">
               <div class="selector-holder">
                  <i class="material-icons">home</i>
                  <span>Home</span>
               </div>
           </a>
            <a href="/search" class="btn  button-inactive">
            
               <div class="selector-holder">
                  <i class="material-icons">search</i>
                  <span>Search</span>
               </div>
               </a>
           <a href="/mycart" class="btn  button-inactive">
               <div class="selector-holder">
                  <i class="material-icons">shopping_basket</i>
                  <span>Bag @if(Cart::count()!=0) {{Cart::content()->count()}} @endif</span>
               </div>
            </a>
           
               
            <a href="/myaccount" class="btn button-inactive">
               <div class="selector-holder">
                  <i class="material-icons">account_circle</i>
                  <span>Account</span>
               </div>
            </a>
         </div>
      </footer>
    @include('partials.scripts')
</body>
</html>
