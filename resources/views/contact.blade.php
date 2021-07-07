@extends('layouts.app')
@section('content')
 
<div class="container my-5">     
 <div>
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11035.145924765395!2d18.40444667782052!3d54.44786978270107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spl!2spl!4v1610913345731!5m2!1spl!2spl" 
	height='100%'width='100%'    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
 </div>
  
    <div class="mx-2 mt-2">
		<h1>Contact</h1>
		<h3>Our phone number: 333 333 333<br>
		Our email: mail@gmail.com<br>
		Our adress: Gdynia radosna 9
    </div>
    <div class="text-center">
        <h1>Any problem?</h1>
        <h3>Just send a message</h3>
        <form>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Your message">
              </div>
            <div class="form-group">
              <label for="email">Your Email address</label>
              <input type="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="message">Your message</label>
              <textarea class="form-control" id="message" rows="7"></textarea>
            </div>
            <button class="btn btn-dark">send</button>
          </form>
    </div>
</div>
@endsection