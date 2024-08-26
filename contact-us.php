<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Us!</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
    rel="stylesheet"
    type="text/css" />

  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/contact.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body>
  <header class="my-3">
    <nav>
      <a href="/"><button
          class="btn btn-dark d-flex justify-content-center align-items-center gap-3 py-2 rounded-3">
          <div>
            <img
              src="./assets/img/back-arrow.svg"
              alt="back arrow"
              width="20"
              class="my-1" />
          </div>
          <div>Back to Home</div>
        </button></a>
    </nav>
  </header>

  <main>
    <section
      class="ftco-section img bg-hero"
      style="background-image: url(assets/img/office-building.jpg)">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-11">
            <div class="wrapper">
              <div class="row no-gutters justify-content-between">
                <div class="col-lg-6 d-flex align-items-stretch">
                  <div class="info-wrap w-100 p-5">
                    <h3 class="mb-4">Contact us</h3>
                    <div class="dbox w-100 d-flex align-items-start">
                      <div
                        class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-map-marker"></span>
                      </div>
                      <div class="text pl-4">
                        <p>
                          <span>Address:</span>3-6 Woodleigh Avenue, Shire
                          of<br />
                          Yarra Ranges <br />Melbourne VIC 3158
                        </p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-start">
                      <div
                        class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-phone"></span>
                      </div>
                      <div class="text pl-4">
                        <p>
                          <span>Phone:</span>
                          <a href="tel://0455555555">045 555 5555</a>
                        </p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-start">
                      <div
                        class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-paper-plane"></span>
                      </div>
                      <div class="text pl-4">
                        <p>
                          <span>Email:</span>
                          <a href="mailto:info@yoursite.com">NathanJims@b2brecruitz.com</a>
                        </p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-start">
                      <div
                        class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-globe"></span>
                      </div>
                      <div class="text pl-4">
                        <p>
                          <span>Website</span> <a href="/">b2brecruitz.com</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">Get in touch</h3>

                    <form
                      method="POST"
                      id="contactForm"
                      name="contact"
                      action="">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="text"
                              class="form-control"
                              name="firstname"
                              id="name"
                              placeholder="Firstname"
                              required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="text"
                              class="form-control"
                              name="lastname"
                              id="lastname"
                              placeholder="Lastname"
                              required />
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="email"
                              class="form-control"
                              name="email"
                              id="email"
                              placeholder="Email"
                              required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="tel"
                              class="form-control"
                              name="phone"
                              id="subject"
                              placeholder="Phone (i.e. 044-444-4444)"
                              pattern="0\d{2}-\d{3}-\d{4}"
                              required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea
                              name="message"
                              class="form-control"
                              id="message"
                              cols="30"
                              rows="5"
                              placeholder="Message"
                              required
                              minlength="10"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input
                              type="submit"
                              value="Send Message"
                              class="btn btn-dark" />

                            <div class="submitting"></div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
