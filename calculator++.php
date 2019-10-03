<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>

    <meta name="description" content="Calculator"/>

    <link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>

    <Title>Calculator++</Title>
</head>
<body>
        <?php
        $km = 0;
        $num1 = 0;
        $num2 = 0;
        $total = 0;
        $option ="";
        $error = "";
        $sliderVal = 0;
    
        if(isset($_GET["submit"]))
        {
            $num1 = $_GET["num1"];

            if(isset($_GET['num2']))
            {
                $num2 = $_GET["num2"];
            }
            
            $option = $_GET["operator"];
            if(is_numeric($num1))
            {
                if(is_numeric($num2))
                {
                   if ($option == "plus")
                {
                    $total =  $num1 + $num2;
                }
                if ($option == "minus")
                {
                    $total =  $num1 - $num2;
                }
                if ($option == "multiply")
                {
                    $total =  $num1 * $num2;
                }
                if ($option == "divide")
                {
                    if ($num1 == 0)
                    {
                        $error= "You cannot divide by 0";
                        echo $error;
                    }
                    if ($num2 == 0)
                    {
                        $error= "You cannot divide by 0";
                        echo $error;
                    }
                    else{
                        $total =  $num1 / $num2;
                    }
                }
                if ($option == "power")
                {
                    $total = pow($num1, $num2);
                }
            if ($option == "kmtomile")
            {
                $total = $num1 * 0.621;
            }
            if ($option == "miletokm")
            {
             $total = $num1 * 1.609;
            }
                }
            if ($option == "sqrt")
            {
                $total = sqrt($num1);
            } 
        }
            else
              {
                $error= "You can only use numbers";
                echo $error;
            }
        }
        ?>
    <div class= "container">
        <div class= "top-part">
        <?php
        if (isset($_GET["sliderDecimalsRange"]))
        {
            $sliderVal = $_GET["sliderDecimalsRange"];
            echo (round($total, $sliderVal));
        }
        else 
        {
           echo 0;
        }
         ?>
         </div>
        <div class= "bottom-part">
            <ul>
                <form method= "get">
                        <li>
                        <label>Number one:</label>
                        <input type="text" name= "num1" placeholder="Your first number" required> 
                        </li>
                        <li >
                        <label>Operator</label> 
                            <select name="operator" id="operator-list">
                                <option value="plus"> + </option>
                                <option value="minus"> - </option>
                                <option value="multiply"> * </option>
                                <option value="divide"> / </option>
                                <option value="power"> ^ </option>
                                <option value="sqrt"> √ </option>
                                <option value="kmtomile"> km conversion to mile</option>
                                <option value="miletokm"> mile conversion to km</option>
                            </select>
                        </li> 
                        <li id="second-input">
                        <label>Number two:</label>
                            <input id="second-input-field" name= "num2" type="text" placeholder="Your second number" required>
                        </li>
                        <li>
                            <label> Decimals: </label>
                            <input id="decimals-input" class="input-numbers" type="number" name="sliderDecimals" placeholder="Slide to pick how many decimals" min="1" max="10" oninput="decimals-slider.value=decimals-input.value"/>
                            <input id="decimals-slider" class="range-slider" type="range" name="sliderDecimalsRange" min="1" max="10" step="1" value="1" oninput="decimals-input.value=decimals-slider.value">
                        </li>
                        <li>  
                            <input type="submit" name="submit" value="Calculate" class= "form-submit-button">
                        </li>
                            </form>
                            <form action="">
                            <button class="form-btn-reset" onclick="clearInputs()">Reset</button>
                            </form>
             </ul>               
        </div>
    </div>
<script type="text/javascript">
        
        let operatorlist = document.getElementById("operator-list");
        let secondInput = document.getElementById("second-input");
        let secondInputField = document.getElementById("second-input-field");

        operatorlist.oninput = function() 
        {

            let selectedOperator = this.value;

            if(selectedOperator == "sqrt")
            {
                secondInputField.disabled = true;
                secondInput.style.display = "none";
            }
            else if(selectedOperator == "kmtomile")
            {
                secondInputField.disabled = true;
                secondInput.style.display = "none";
            }
            else if(selectedOperator == "miletokm")
            {
                secondInputField.disabled = true;
                secondInput.style.display = "none";
            }
            else
            {
                secondInputField.disabled = false;
                secondInput.style.display = "block";
            }
            
        }
</script>
<script type="text/javascript">  

    let decimalSlider = document.getElementById("decimals-slider");
    let decimalsInput = document.getElementById("decimals-input");

    decimalSlider.oninput = function()
    {
        decimalsInput.value = this.value;
    }
</script>
</body>  
</html>