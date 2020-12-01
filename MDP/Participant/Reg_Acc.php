<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style3.css">
</head>
<body>  
<div class="header"  >
    <h1>Account Registration</h1>  
</div> 
<main class="container">
    <form action="process_reg.php" method="post">
   
    <div class="row">
      <h4>Personal Information</h4>
 
      <div class="input-group input-group-icon">
        <input type="text" name="first_name" id="first_name" placeholder="Enter first name" maxlength="45" aria-label="first_name"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      
      <div class="input-group input-group-icon">
        <input  type="text" name="last_name" id="last_name" placeholder="Enter last name" required maxlength="45" aria-label="last_name"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>

      <div class="input-group input-group-icon">          
        <input type="email" name="email" id="email" placeholder="Enter Email" required maxlength="45" aria-label="email"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
    </div>
        
    <div class="row">
      <div class="col-half">
        <h4>Date of Birth</h4>
            <select name="dob_day" id="RegistrationForm_day" aria-label="RegistrationForm_day">
            <option value="" selected="selected">Day</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            </select>
            <select  name="dob_month" id="RegistrationForm_month" aria-label="RegistrationForm_month">
            <option value="" selected="selected">Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
            </select>                                                
            <select  name="dob_year" id="RegistrationForm_year" aria-label="RegistrationForm_year">
            <option value="" selected="selected">Year</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>            
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
            <option value="1976">1976</option>
            <option value="1975">1975</option>
            <option value="1974">1974</option>
            <option value="1973">1973</option>
            <option value="1972">1972</option>
            <option value="1971">1971</option>
            <option value="1970">1970</option>
            <option value="1969">1969</option>
            <option value="1968">1968</option>
            <option value="1967">1967</option>
            <option value="1966">1966</option>
            <option value="1965">1965</option>
            <option value="1964">1964</option>
            <option value="1963">1963</option>
            <option value="1962">1962</option>
            <option value="1961">1961</option>
            <option value="1960">1960</option>
            <option value="1959">1959</option>
            <option value="1958">1958</option>
            <option value="1957">1957</option>
            <option value="1956">1956</option>
            <option value="1955">1955</option>
            <option value="1954">1954</option>
            <option value="1953">1953</option>
            <option value="1952">1952</option>
            <option value="1951">1951</option>
            <option value="1950">1950</option>
            <option value="1949">1949</option>
            <option value="1948">1948</option>
            <option value="1947">1947</option>
            <option value="1946">1946</option>
            <option value="1945">1945</option>
            <option value="1944">1944</option>
            <option value="1943">1943</option>
            <option value="1942">1942</option>
            <option value="1941">1941</option>
            <option value="1940">1940</option>
            <option value="1939">1939</option>
            <option value="1938">1938</option>
            <option value="1937">1937</option>
            <option value="1936">1936</option>
            <option value="1935">1935</option>
            <option value="1934">1934</option>
            <option value="1933">1933</option>
            <option value="1932">1932</option>
            <option value="1931">1931</option>
            <option value="1930">1930</option>
            <option value="1929">1929</option>
            <option value="1928">1928</option>
            <option value="1927">1927</option>
            <option value="1926">1926</option>
            <option value="1925">1925</option>
            <option value="1924">1924</option>
            <option value="1923">1923</option>
            <option value="1922">1922</option>
            <option value="1921">1921</option>
            <option value="1920">1920</option>
            <option value="1919">1919</option>
            <option value="1918">1918</option>
            <option value="1917">1917</option>
            <option value="1916">1916</option>
            <option value="1915">1915</option>
            <option value="1914">1914</option>
            <option value="1913">1913</option>
            <option value="1912">1912</option>
            <option value="1911">1911</option>
            <option value="1910">1910</option>
            <option value="1909">1909</option>
            <option value="1908">1908</option>
            <option value="1907">1907</option>
            <option value="1906">1906</option>
            <option value="1905">1905</option>
            <option value="1904">1904</option>
            <option value="1903">1903</option>
            <option value="1902">1902</option>
            <option value="1901">1901</option>
            <option value="1900">1900</option>
            </select>     
            </div>
    </div>
        
    <div class="row">
      <h4>Gender</h4>
    <select name="gender" id="gender" aria-label="Gender">
        <option value="">Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    </div>
        
      <div class="row">
      <h4>Blood Type</h4>
    <select required name="blood_type" id="bloodtype" aria-label="Bloodtype">
    <!--<option value="" selected="selected">Gender</option>-->
    <option value="">Blood Type</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    </select>
      </div> 
     
    <div class="row">
      <h4>Login Details</h4>
      <div class="input-group input-group-icon">               
        <input type="text" name="username" id="username" placeholder="Enter username" required maxlength="45" aria-label="username"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
     </div> 
        
    <div class="row">
      <div class="input-group input-group-icon">

        <input type="password" name="pass" id="password" placeholder="Enter password" required maxlength="45" aria-label="password"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
    </div>
        
    <div class="row">    
      <div class="input-group input-group-icon">
           
        <input type="password" name="pass1" id="password1" placeholder="Confirm password" required maxlength="45" aria-label="password1"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
     </div>
    <div class="row">       
        <div class="form-check" id="checkbox">
            <h4>Terms and Conditions</h4>
           <input type="checkbox" required id="terms" aria-label="checkbox"> <label for="terms">
             I accept the <a href="https://singaporemarathon.com/rules-regulations/#STRUNSCSM.html" >terms and conditions</a> for signing up to this service, and hereby confirm I have read the privacy policy.</label>
       </div>
    </div>
        
        <div class="row">   
    <div class="input-group" name="submit">
            <input type="submit" name="submit" value="Register" id="register" style="background-color: blue;color:white" aria-label="submit"/>
    </div>
    </div>
        
    </form>
    <p>
    Already have an account?
    <a href="Login.php">Sign In</a>
    </p>  
</main>
</body>
</html>
