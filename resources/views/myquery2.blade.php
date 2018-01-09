<style type="text/css">

</style>

<body>

<p>First Sentence</p>
<p>Second Sentence</p>
<p>Third Sentence</p>
<p>Fourth Sentence</p>
<p>Fifth Sentence</p>

</body>
</html>
<script src="{{ url('js/jquery.js') }}"></script>
<script>
 for(li of document.querySelectorAll('body > p'))
  {

    let words = li.innerHTML.split(' ');

    li.innerHTML = "<strong>"+words.shift()+"</strong> "+words.join(' ');

  }


  // or
  // $(document).ready(function(){

  //   var all = $("p");                          // Select all p tag

  //   for(var i=0;i<all.length;i++){            //Iterate over the collection

  //       var html = $(all[i]).html();          //get html
  //       var firstWord = html.split(" ")[0];   //get first word

  //       var boldFirstWord = "<b>"+firstWord+"</b>";   // make first word bold html syntax

  //       var newhtml = html.replace(firstWord, boldFirstWord);  // replace firstword with upper case word

  //       $(all[i]).html(newhtml);              // replace the html
  //   }
  // });
</script>
