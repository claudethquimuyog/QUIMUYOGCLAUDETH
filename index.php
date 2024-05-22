!DOCTYPE html>
<html>
<head>
    <title>Geometry Calculator</title>
</head>
<body>
    <h1>Geometry Calculator</h1>
    <form method="post" action="">
        <label for="calculation">Select Calculation:</label>
        <select name="calculation" id="calculation">
            <option value="area_circle">Area of a Circle</option>
            <option value="circumference_circle">Circumference of a Circle</option>
            <option value="area_rectangle">Area of a Rectangle</option>
            <option value="perimeter_rectangle">Perimeter of a Rectangle</option>
            <option value="area_triangle">Area of a Triangle</option>
            <option value="perimeter_triangle">Perimeter of a Triangle</option>
            <option value="volume_sphere">Volume of a Sphere</option>
            <option value="surface_area_sphere">Surface Area of a Sphere</option>
            <option value="volume_cylinder">Volume of a Cylinder</option>
            <option value="surface_area_cylinder">Surface Area of a Cylinder</option>
        </select>
        <br><br>

        <div id="parameters">
            <!-- Dynamic form elements will be inserted here -->
        </div>

        <br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $calculation = $_POST['calculation'];

        switch ($calculation) {
            case 'area_circle':
                $radius = $_POST['radius'];
                $result = pi() * pow($radius, 2);
                echo "Area of the circle is: $result";
                break;
            case 'circumference_circle':
                $radius = $_POST['radius'];
                $result = 2 * pi() * $radius;
                echo "Circumference of the circle is: $result";
                break;
            case 'area_rectangle':
                $length = $_POST['length'];
                $width = $_POST['width'];
                $result = $length * $width;
                echo "Area of the rectangle is: $result";
                break;
            case 'perimeter_rectangle':
                $length = $_POST['length'];
                $width = $_POST['width'];
                $result = 2 * ($length + $width);
                echo "Perimeter of the rectangle is: $result";
                break;
            case 'area_triangle':
                $base = $_POST['base'];
                $height = $_POST['height'];
                $result = 0.5 * $base * $height;
                echo "Area of the triangle is: $result";
                break;
            case 'perimeter_triangle':
                $side1 = $_POST['side1'];
                $side2 = $_POST['side2'];
                $side3 = $_POST['side3'];
                $result = $side1 + $side2 + $side3;
                echo "Perimeter of the triangle is: $result";
                break;
            case 'volume_sphere':
                $radius = $_POST['radius'];
                $result = (4/3) * pi() * pow($radius, 3);
                echo "Volume of the sphere is: $result";
                break;
            case 'surface_area_sphere':
                $radius = $_POST['radius'];
                $result = 4 * pi() * pow($radius, 2);
                echo "Surface area of the sphere is: $result";
                break;
            case 'volume_cylinder':
                $radius = $_POST['radius'];
                $height = $_POST['height'];
                $result = pi() * pow($radius, 2) * $height;
                echo "Volume of the cylinder is: $result";
                break;
            case 'surface_area_cylinder':
                $radius = $_POST['radius'];
                $height = $_POST['height'];
                $result = 2 * pi() * $radius * ($radius + $height);
                echo "Surface area of the cylinder is: $result";
                break;
            default:
                echo "Invalid selection.";
        }
    }
    ?>

    <script>
        document.getElementById('calculation').addEventListener('change', function () {
            var parameters = document.getElementById('parameters');
            parameters.innerHTML = '';

            switch (this.value) {
                case 'area_circle':
                case 'circumference_circle':
                case 'volume_sphere':
                case 'surface_area_sphere':
                    parameters.innerHTML = '<label for="radius">Radius:</label><input type="number" name="radius" id="radius" required>';
                    break;
                case 'area_rectangle':
                case 'perimeter_rectangle':
                    parameters.innerHTML = '<label for="length">Length:</label><input type="number" name="length" id="length" required><br><label for="width">Width:</label><input type="number" name="width" id="width" required>';
                    break;
                case 'area_triangle':
                    parameters.innerHTML = '<label for="base">Base:</label><input type="number" name="base" id="base" required><br><label for="height">Height:</label><input type="number" name="height" id="height" required>';
                    break;
                case 'perimeter_triangle':
                    parameters.innerHTML = '<label for="side1">Side 1:</label><input type="number" name="side1" id="side1" required><br><label for="side2">Side 2:</label><input type="number" name="side2" id="side2" required><br><label for="side3">Side 3:</label><input type="number" name="side3" id="side3" required>';
                    break;
                case 'volume_cylinder':
                case 'surface_area_cylinder':
                    parameters.innerHTML = '<label for="radius">Radius:</label><input type="number" name="radius" id="radius" required><br><label for="height">Height:</label><input type="number" name="height" id="height" required>';
                    break;
                default:
                    parameters.innerHTML = '';
            }
        });
    </script>
</body>
</html>
