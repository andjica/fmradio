  <!-- Footer -->
  <footer class="py-5" style="background-color:#212121">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/remove-from-playlist.js"></script>
  <script>
    
    function myFunction(event){
        event.preventDefault();
    
     alert("andjica");
    
        
            let useremail = document.getElementById('email');
            let password = document.getElementById('password');
          
            let regEmail = /^[\w\-.+_%]+@[\w\.\-]+\.[A-Za-z0-9]{2,}$/;
            let regPassword =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
            let errors = [];
          
            let emailHtml = document.getElementById('email-reg');
            let passHtml = document.getElementById('pass-reg');
          
            if(!regPassword.test(useremail.value)){
          
              emailHtml.innerHTML="Incorect email";
              emailHtml.style.color="red";
              errors.push('Bad email');
            }
            
            if(!regPassword.test(password.value))
            {
                passHtml.innerHTML="Incorect password";
                passHtml.style.color="red";
                errors.push('Bad password');
            }
    
            if(errors.length == 0)
            {
                 return true;
            }
          
      };
      </script>
      <script src="assets/js/get-id.js"></script>
</body>


</html>