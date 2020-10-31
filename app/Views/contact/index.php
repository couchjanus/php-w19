<div class="py-5 bg-light">
  <div class="row">

    <div class="container-wrapper" id="container">
        <div class="form-container address-container">
            <form>
                <h1><?=$addressTitle;?></h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <?php if (isset($address)):?>
                    <?php foreach ($address as $key => $value) {?>
                                          
                    <label><i class="fas fa-home"></i>: <?php echo $value['street'];?></label>
                    <label><i class="fas fa-envelope-square"></i>: <?php echo $value['email'];?></label>
                <label><i class="fas fa-phone-square-alt"></i>: <?php echo $value['mobile'];?></label>
                <label><i class="fas fa-map-marker-alt"></i>: <?php echo $value['city'];?></label>
                <label><i class="fas fa-university"></i>: <?php echo $value['country'];?></label>
                <?php 
                    }
                    endif;
                ?>
            </form>
        </div>
        <div class="form-container contact-container">
            <form action="/login" method="POST">
                <h1><?=$title;?></h1>
                <span>Drop us some message</span>
                <input type="text" id="username" name="username"
                    placeholder="Enter name" required>
                <input type="email" name="email" placeholder="Email" autocomplete="off"  required />
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                
                <button type="submit">Submit Your Message</button>
            </form>
        </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col">
        <div class="card">
                <div class="card-header bg-primary text-white"><i class="fas fa-envelope"></i> Comments
                </div>
                <div class="card-body">
                <?php
                if (isset($comments)):
                    printf("<h2>There Are %d Comments In Guest Book</h2>", count($comments));       
                    foreach ($comments as $key => $value) {
                        echo("<div class='top'><b>User ".$value['username']." </b> <a href='mailto:".$value['email']."'>".$value['email']."</a>  Added this: </div><div class='comment'>".strip_tags($value['message'])."</div>"."<p>At ".strip_tags($value['created_at'])."</p><hr>");
                    }
                else:
                    printf("<h2 style='color: #%x%x%x'>No Comments Yet...</h2>", 165, 27, 45);
                endif;
                ?>
                </div>
            </div>
        </div>
  </div>
</div>