

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="timeline">
                <!-- timeline time label -->
                <div class="time-label">
                    <span class="bg-red">10 Feb. 2014</span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                        <div class="timeline-body">
                            <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...</p>
                        </div>
                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-sm">Read more</a>
                            <a class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
                <!-- END timeline item -->

                <!-- Agrega aquí tu recuadro para poner información y subirla -->
                <div>
                     <img src="https://ui-avatars.com/api/?name={{urlencode(auth()->user()->name) }}&color=f9f9f9&background=323e62'" width="30" class="rounded-circle ">
                    <div class="timeline-item">
                        
                        <h3 class="timeline-header">Añadir una nueva publicación</h3>
                        <div class="timeline-body">
                            <form method="post" action="">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="nueva_informacion" rows="4" placeholder="Escribe tu información aquí"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Subir</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fin del recuadro para poner información -->

                <!-- Agrega más elementos del timeline según sea necesario -->

       
            </div>
        </div>
    </div>
</div>

