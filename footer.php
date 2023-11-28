
          
            <div class="container">
                <footer class="py-3 my-4">
                  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link px-2 text-body-secondary">Login</a></li>

                  </ul>
                  <p class="text-center text-body-secondary">© 2023 Easy Vendor, Inc</p>
                </footer>
            </div>
    </body>
</html>
<?php 
try {
  if(isset($ch)){
    curl_close($ch);
  }
  
} catch (Exception $e) {
  // Código para lidar com a exceção
  echo "Exceção capturada: " . $e->getMessage();
}

?>