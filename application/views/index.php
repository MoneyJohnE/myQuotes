<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Quotsy</title>
  <meta name="Famouse Quotes" content="">
  <meta name="John Echeverri" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="../assets/images/favicon.png">

  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script>
      $(document).ready(function(){
        // we are getting all of the quotes so that when the user first requests the page the page will        // already be rendering the quotes
        $.get('/quotes/index_html', function(res) {
          // this url returns html string so we can dump that straight into div#quotes
          $('#quotes').html(res);
        });
        $('form').submit(function(){
          // there are three arguments that we are passing into $.post function
          //     1. the url we want to go to: '/quotes/create'
          //     2. what we want to send to this url: $(this).serialize()
          //            $(this) is the form and by calling .serialize() function on the form it will
          //            send post data to the url with the names in the inputs as keys
          //     3. the function we want to run when we get a response:
          //            function(res) { $('#quotes').html(res) }
          $.post('/quotes/create', $(this).serialize(), function(res) {
            $('#quotes').html(res);
          });
          // we have to return false for it to be a single page application because without it jQuery's           // submit function will cause a refresh of the page which would defeat the point of AJAX
          return false;
        });
      });
    </script>

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div class="container">
      <div class="row">

         <h1>Add A Famous Quote</h1>
            <form action="/quotes/create" method="post">

      <p>
        <label>Author: </label>
        <input type="text" name="author">
      </p>
      <p>
        <label>Quote: </label>
        <textarea name="quote">
        </textarea>
      </p>
      <input type="submit" value="Add Quote">
    </form>
    <div id="quotes">

    </div>
    </div>
</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
