@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Jokes</title>
@endsection
@section('content')
@include('pages.headers.js')
<div id="custom-html-52" custom-code="true" data-rv-view="48" style="margin: 40px 0 100px 0;">
  <div class="container">
    <h4>Chuck Norris Joke Generator</h4>
    <form>
      <div class="form-group">
        <input type="number" id="number" class="form-control" placeholder="Number of jokes" required>
      </div>
      <div>
        <button class="get-jokes btn btn-primary">Get Jokes</button>
      </div>
    </form>
    <ul class="jokes list-group"></ul>
  </div>
</div>
<section class="mbr-section content8 cid-qwPzbpLJTt" id="content8-19" data-rv-view="74">
    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center"><a class="btn btn-warning display-4" href="https://github.com/TraianAlex/vic/blob/master/resources/views/pages/jokes.blade.php" target="_blank">Get Code</a></div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script data-turbolinks-eval="false" data-turbolinks-track="reload">
document.querySelector('.get-jokes').addEventListener('click', getJokes);

function getJokes(e) {
    const number = document.querySelector('input[type="number"]').value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `https://api.icndb.com/jokes/random/${number}`, true);
    xhr.onload = function() {
        if(this.status === 200) {
          const response = JSON.parse(this.responseText);
          let output = '';
          if(response.type === 'success') {
              response.value.forEach(function(joke){
                  output += `<li class="list-group-item">${joke.joke}</li>`;
              });
          } else {
              output += '<li class="list-group-item">Something went wrong</li>';
          }
          document.querySelector('.jokes').innerHTML = output;
        }
    }
    xhr.send();
    e.preventDefault();
}
</script>
@endsection