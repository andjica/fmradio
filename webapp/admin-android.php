<?php
    session_start();
    
    if(! $_SESSION['user'])
    {
        return header("Location: index.php");
    }
    
    include "views/header.php";
    include "views/nav.php";

   
   
?>

<div class="container p-5">
<h3 class="text-danger my-5">Manage your mobile app, insert songs to your mobile aplication</h3>
<div class="row">
<table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col"><i class="fa fa-music"></i></th>
                <th scope="col"></th>
                <th scope="col">Song</th>
                <th scope="col">Name of song</th>
                <th scope="col">Description of song</th>
                <th scope="col">Name of artist</th>
                <th scope="col">Name of album</th>
    
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once "config/connection.php";
                    
                    $query = "SELECT s.id AS idSong, s.song_url, s.description,
                    s.song_name, s.artist_name, s.album_name, i.url AS url
                    FROM songs s INNER JOIN images i ON s.img_id=i.id WHERE s.active_img = :active";
                    $active = 1;
                    $st = $connection->prepare($query);
                    $st->bindParam(":active",$active);
                    $st->execute();
                    $songs = $st->fetchAll();
              
                    foreach($songs as $song):
                ?>
                <tr>
                <th scope="row"><?= $song->idSong ?></th>
                <td><img src="<?= $song->url ?>" style="widht:60px;height:60px;"/></td>
                <td><?= $song->song_url ?></td>
                <td><?= $song->song_name ?></td>
                <td><?= $song->description ?></td>
                <td><?= $song->artist_name ?></td>
                <td><?= $song->album_name ?></td>
                
                </tr>
                <?php  endforeach; ?>
                
            </tbody>
            </table>
</div>
<?php if(isset($_REQUEST['success'])=="done")
    {
        echo "<div class='alert alert-success' role='alert'>
        You create a category for song successfully! :)
      </div>";
    }?>
    <div class="row my-4">
        <div class="col-lg-4">
           <?php include "views/sidebar.php"; ?>
        </div>
        <div class="col-lg-8 border p-3 rounded">
        <form action="php/create-songs-categories.php" method="POST" enctype="multipart/form-data" accept-character="utf-8">
        <div class="card">
            <div class="card-header">
            <h3 class="text-dark">Choose category for song</h3>
            </div>
        </div>
            <div class="form-group my-4">
                <label for="Album">Song name:</label>
                <select name="songs">
                    <option value="0" class="form-control">Choose song</option>
                    <?php 
                        $query = "SELECT * FROM songs";
                        $songs = executeQuery($query);
                        foreach($songs as $s):
                    ?>
                    <option value="<?= $s->id ?>"><?= $s->song_name ?>(<?= $s->artist_name ?>)</option>
                        <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Album">Choose category:</label>
                <select name="cat">
                    <option value="0" class="form-control">Set category</option>
                    <?php 
                        $query = "SELECT * FROM categories";
                        $songs = executeQuery($query);
                        foreach($songs as $s):
                    ?>
                    <option value="<?= $s->id ?>"><?= $s->name ?></option>
                        <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="create">Submit</button>
            </form>
      
        </div>
    </div>
    <div class="row p-3">
       <div clas="col-lg-3">
            <?php include "views/releases-table.php" ?>
    </div>
    </div>
</div>
<?php include "views/footer.php"; ?>