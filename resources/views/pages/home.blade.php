@extends('layouts.app')

@section('stylesheets')

	<link rel="stylesheet" type="text/css" href="css/new.css">
	<style>
	.categoryListBoxContents {
  height: 150px;      /* equals max image height */
  line-height: 100px;
  width: 33%;
  text-align: center;
  float: left;
}
.categoryListBoxContents a img {
  vertical-align: middle;
  max-height: 250px;
  max-width: 300px;
}
.cat-image-heading {
  line-height: 20px;
}
.clear { clear: both; height: 50px; }
.content-section {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: auto;
}
.card {
  flex: 1;
  margin: 20px 20px;
  border-radius: 10px;
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
  padding: 15px;
}
.card img {
  width: 100%;
  height: 250px;
  object-fit: cover;
}
.card h4 {
  margin-top: 20px;
  font-size: 20px;
}
.card p {
  font-size: 16px;
  margin-top: 10px;
  color: #3d3d3d;
  line-height: 1.5;
}
@media screen and (max-width: 640px) {
  .content-section {
    flex-direction: column;
  }
}
	</style>

@endsection

@section('content')

<marquee behavior="scroll" direction="left"><p style="color:white;font-size:17px;"><span style="color:red;">{{ $message }}</span></p></marquee>
<hr/>
<div class="container" id="indexCategories">

<div class="row">
    <div class="content-section">
    
    <div class="card">
         <img src="/public/img/category/vege.jpg" alt="vege"  >
          <a href="/category/1/vegetables"><h4 style="text-align: center;">Vegetables</h4></a>
         
        </div>
         <div class="card">
         <img src="/public/img/category/fruits.jpg" alt="fruits"  >
           <a href="/category/3/fruits"><h4 style="text-align: center;">Fruits</h4></a>
         
        </div>
         <div class="card">
         <img src="/public/img/category/dairy.jpg" alt="dairy"  >
           <a href="/category/2/Dairy"><h4 style="text-align: center;">Dairy</h4></a>
         
        </div>
        </div>
      </div>
      <div class="row">
    <div class="content-section">
    
    <div class="card">
         <img src="/public/img/category/meat.jpg" alt="meat"  >
           <a href="/category/5/meat"><h4 style="text-align: center;">Meat</h4></a>
         
        </div>
         <div class="card">
         <img src="/public/img/category/grocery.jpg" alt="grocery"  >
           <a href="/category/13/Grocery"><h4 style="text-align: center;">Grocery</h4></a>
         
        </div>
         <div class="card">
         <img src="/public/img/category/plants.jpg" alt="Plants"  >
           <a href="/category/11/indoors-plants-and-flowers"><h4 style="text-align: center;">Flowers & Plants</h4></a>
         
        </div>
        </div>
        <div class="content-section">
    
    <div class="card">
         <img src="/public/img/category/pickle.jpg" alt="pickle"  >
           <a href="/category/10/pickles"><h4 style="text-align: center;">Pickles</h4></a>
         
        </div>
          <div class="card">
         <img src="/public/img/category/bakery.jpg" alt="bakery"  >
           <a href="/category/14/bakery"><h4 style="text-align: center;">Bakery</h4></a>
         
        </div>
        </div>
      </div>



<br class="clear">


</div>
		
@endsection