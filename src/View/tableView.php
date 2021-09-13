<?php
declare(strict_types=1);

namespace App\View;





?>




<?php class tableView {
    public function displayTable() { ?>
        <table border=1>
    <tr>
        <th>Platz</th>
    </tr>
<?php
$content = file_get_contents("../football.json");
$data = json_decode($content, true);
foreach ($data as $item)  { ?>
    <tr>
        <td><?php echo $item['position']; ?></td>
        <td><a href="index.php?club=<?php echo $item['name']; ?>"><?php echo $item['name']; ?></a></td>
    </tr>
<?php }

    }

}
