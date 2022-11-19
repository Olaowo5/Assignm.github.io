
<?php include './components/header.php';?>
    <main>
     
      <form id="form">

        <h3>Skills Wanted</h3>
        <input type="checkbox" id="html" name="html" value="html" />
        <label for="html">HTML</label>
        <br>
        <input type="checkbox" id="java" name="java" value="Java" />
        <label for="java">Java</label>
        <br>
        <input type="checkbox" id="php" name="php" value="pHp" />
        <label for="php">pHp</label>
        <br>
        <p>etc..</p>
        <h3>Group Size</h3>
        <div class="slider">
          <!--Snatched from the internet-->
          <input
            type="range"
            min="1"
            max="10"
            value="10"
            oninput="rangeValue.innerText = this.value"
          />
          <p id="rangeValue">10</p>
        </div>
        <h3>More menues to be determined</h3>
        <p>Stuff</p>
        <button type="submit">Submit</button>
      </form>
      <div id="pagetitle">
        <h1>Project List</h1>
        <select name="filter" id="filter">
          <option value="hightolow">Sort from High to Low</option>
          <option value="other">etc.</option>
        </select>
        <input type="text" placeholder="Search Bar" />
      </div>

      <!--Grid of sorts-->
      
      
      <?php 
        $test="hello";
        $projects = array(
            array(
              "name"=>"Mike's Bakery", 
              "description"=>"Start an online bakery with delivery or pickup option." ,
              "founder"=>"Michael Baker",
              "skillsWanted" => array("Business", "Admin", "Makrketing", "Web Development", "Accounting")            
            ),
            array(
              "name"=>"Accounting Services", 
              "description"=>"Start an accounting service website with ecommerce capabilities." ,
              "founder"=>"John Snow",
              "skillsWanted" => array("Business", "Admin", "Makrketing", "Web Development")
            ),
            array(
              "name"=>"Web Design ePortfolios", 
              "description"=>"Start a business providing web design for students at AC." ,
              "founder"=>"Brandon Stark",
              "skillsWanted" => array("Business Admin", "Makrketing")
            )
          );
          $projectsLength = count($projects);
          for ($x=0; $x < $projectsLength; $x++){
            echo "<div class='projectlist'>";
            echo "<h4>" . $projects[$x]["name"] . "</h4>";
            echo "<p>" . $projects[$x]["description"] . "</p>";
            echo "<ul>";
            foreach($projects[$x]["skillsWanted"] as $skill){
              echo "<li>" . $skill . "</li>";
            }            
            echo "</ul>";
            echo "<p>" . $projects[$x]["founder"] . "</p>";
            echo "</div>";
          }
      ;?>
      


    </main>
<?php include './components/footer.php' ;?>