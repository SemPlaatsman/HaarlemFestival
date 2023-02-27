    </main>
    <footer class="bg-primary-a footer">
      <section class="container p-1 row mx-auto d-flex align-items-center">
        <section class="col-md-6">
          <h1 class="footer-title display-5 mb-0 mt-1">SIGN UP FOR OUR NEWSLETTER!</h1>
          <p class="footer-text mb-2">Subscribe to our newsletter to get the latest information about Haarlem!</p>
        </section>
        <form class="col-md-6 d-flex align-items-center h-75" action="" id="newsletterForm">
          <input class="footer-input border border-3 border-dark fs-5 w-75" type="email" name="email" placeholder="tourist@haarlem.nl">
          <button class="footer-input footer-title fs-2 bg-dark text-primary-a border-0" type="submit" form="newsletterForm">SIGN UP</button>
        </form>
      </section>
    </footer>
    <script src="https://kit.fontawesome.com/815494004e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/<?= strtolower($directory); ?>.js"></script>
  </body>
</html>