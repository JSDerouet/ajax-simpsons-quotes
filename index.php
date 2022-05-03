<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Ajax quest challenge</title>
  <link rel="icon" type="image/png" href="favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel='stylesheet' href='https://unpkg.com/bulma@0.7.5/css/bulma.min.css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <style>
  </style>
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class="title">Simpsons Quotes</h1>
      <button onClick="fetchSimpsonsJSON()">Reload for another joke!</button>
      <div class="content" id="simpsons">
      </div>
    </div>

  </section>

  <!-- We need to load axios first! -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js" integrity="sha256-S1J4GVHHDMiirir9qsXWc8ZWw74PHHafpsHp5PXtjTs=" crossorigin="anonymous"></script>
  <script>

function fetchSimpsonsJSON() {
    const simpsonsId = 1;
    const url = `https://simpsons-quotes-api.herokuapp.com/quotes`;
    axios.get(url)
      .then(function(response) {
        return response.data[0];
      })
      .then(function(simpsons) {
        console.log('data decoded from JSON:', simpsons);
  
        const simpsonsHtml = `
          <p><strong>${simpsons.character}</strong></p>
          <p>${simpsons.quote}</p>
          <img src="${simpsons.image}" />
        `;
        document.querySelector('#simpsons').innerHTML = simpsonsHtml;
      });
  }
  
  fetchSimpsonsJSON();
  </script>
</body>

</html>
