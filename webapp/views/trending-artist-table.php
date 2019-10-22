

<h3>Trending artist songs</h3>
<table class="table table-bordered table-primary my-5">

        <thead>
            <tr>
            <th scope="col">Name of category</th>
            <th scope="col">Name of song</th>
            <th scope="col">Name of artist</th>
            </tr>
        </thead>
        <tbody>
        <?php
    
                $q = "SELECT c.name AS name, s.song_name AS songName, s.artist_name AS artist
                FROM songs s INNER JOIN songs_categories sg ON s.id=sg.id_song 
                INNER JOIN categories c ON sg.id_category = c.id
                WHERE c.id = 3";
                $cs = executeQuery($q);
                foreach($cs as $c):
            ?>
            <tr>
            <th scope="row"><?= $c->name ?></th>
            <td><?= $c->songName ?></td>
            <td><?= $c->artist ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>