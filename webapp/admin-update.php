<?php
    session_start();
    
    if(! $_SESSION['user'])
    {
        return header("Location: index.php");
    }
    
    include "views/header.php";
    include "views/nav.php";

   
   
?>
<?php include "views/header-master.php"; ?>
<div class="container">
<div class="row">
<h3 class="text-danger">Manage songs</h3>
<table class="table table-striped" id="add-all">
            <thead class="thead-dark">
                <tr>
                <th scope="col"><i class="fa fa-music"></i></th>
                <th scope="col"></th>
                <th scope="col">Song</th>
                <th scope="col">Name of song</th>
                <th scope="col">Description of song</th>
                <th scope="col">Name of artist</th>
                <th scope="col">Name of album</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="add-delete-result">
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
                <tr id="add-result">
                <th scope="row"><?= $song->idSong ?></th>
                <td><img src="<?= $song->url ?>" style="widht:60px;height:60px;"/></td>
                <td><?= $song->song_url ?></td>
                <td><?= $song->song_name ?></td>
                <td><?= $song->description ?></td>
                <td><?= $song->artist_name ?></td>
                <td><?= $song->album_name ?></td>
                <td><a data-id="<?= $song->idSong ?>" href="#" class="izmeni"  data-toggle="tooltip" data-placement="right" title="Edit song"><i class="fa fa-edit fa-2x text-danger"></i></a></td>
                <td><a href="php/delete-song.php?id=<?= $song->idSong ?>"  data-toggle="tooltip" data-placement="right" title="Delete song"><i class="fa fa-2x text-danger fa-minus-circle"></i></td>
                </tr>
                <?php  endforeach; ?>
                
            </tbody>
            </table>
</div>
<?php if(isset($_REQUEST['success'])=="done")
    {
        echo "<div class='alert alert-success' role='alert'>
        You update a song  successfully! :)
      </div>";
    }?>
    <div class="row my-4">
        <div class="col-lg-4">
            <?php include "views/sidebar.php"; ?>
        </div>
        <div class="col-lg-8 border p-3 rounded">
        <form action="php/edit-song.php" method="POST" enctype="multipart/form-data" accept-character="utf-8">
        <div class="card">
            <div class="card-header">
            <h3 class="text-dark">Edit your song</h3>
            </div>
        </div>
        <div class="form-group">
        <input type="hidden" name="idSong" id="idSong">
                <label for="Album" class="text-danger">Choose song you want to edit:</label>
                <select name="songs" id="chooseSong">
                    <option value="0" class="form-control">Choose song</option>
                    <?php 
                        $query = "SELECT * FROM songs WHERE active_img = 1";
                        $songs = executeQuery($query);
                        foreach($songs as $s):
                    ?>
                    <option value="<?= $s->id ?>"><?= $s->song_name ?>(<?= $s->artist_name ?>)</option>
                        <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Songname">Edit Song name:</label>
                <input type="text" class="form-control" name="songname" id="songname" placeholder="Song">
            </div>
            <div class="form-group">
                <label for="Description">Edit description:</label>
                <textarea class="form-control" name="desc" id="desc" placeholder="Some description about this song"></textarea>
            </div>
            <div class="form-group">
                <label for="Artist">Edit Artist name:</label>
                <input type="text" class="form-control" name="artist" id="artist" placeholder="Artist name">
            </div>
            <div class="form-group">
                <label for="Album">Edit Album name:</label>
                <input type="text" class="form-control" name="album" id="album" placeholder="Album name">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include "views/footer.php"; ?>