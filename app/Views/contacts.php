<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-6 wow slideInDown" data-wow-duration="3s">
            <div class="card border-0 bg-pink text-light">
                <div class="card-body">
                    <h4>Our Contacts</h4>
                    <div class="row justify-content-between">
                        <h5 class="font-weight-bold">Address: <i class="fas fa-arrow-right text-primary"></i></h5>
                        <p>Sixth Floor – Trust Tower, Plot 4 Kyadondo Road, Nakasero</p>
                    </div>
                    <br/>
                    <div class="row justify-content-between">
                        <h5 class="font-weight-bold">Telephone: <i class="fas fa-arrow-right text-primary"></i></h5>
                        <p>+256 200 903 169</p>
                    </div>
                    <br/>
                    <div class="row justify-content-between">
                        <h5 class="font-weight-bold">Email: <i class="fas fa-arrow-right text-primary"></i></h5>
                        <p>info@pnkadvocates.co.ug</p>
                    </div>
                    <br/>
                    <h4><u>Reach Out</u></h4>
                    <form action="<?= site_url('send') ?>" method="post" id="messageForm">
                        <div class="form-group">
                            <label for="name" class="control-label">Full Name
                                <input type="text" name="name" class="form-control" placeholder="enter your full name" id="name" onblur="ValidateName(this.value)" required/>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email 
                                <input type="email" name="email" class="form-control" id="email" onblur="ValidateEmail(this.value)" required/>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" id="message" onkeyup="ValidateMessage(this.value)" placeholder="type your message here" rows="5" reduired></textarea>
                            <div class="row justify-content-end">
                                Minimum characters: &nbsp; <span id="max-words">100</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="send-btn" class="btn btn-primary">SEND MESSAGE</button>
                        </div>
                        <div class="response"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6 wow zoomIn" data-wow-duration="3s">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.751777503708!2d32.5754484147485!3d0.33091186409375134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbb9366085f43%3A0xc59213ef1476f41e!2sTrust+Tower!5e0!3m2!1sen!2sug!4v1557572822447!5m2!1sen!2sug" width="600" height="800" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>