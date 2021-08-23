<div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1 d-lg-none" style="margin-top: -70%;" >
                    <div class="booking-form">
                        <div class="text-center">
                            <img src="img/imgOne.png" alt="" height="34px">
                        </div>

                        <h3 class="text-center">Login</h3>

                       
                        <form method="post" action="https://online.holidaytravel.com.mx/auth/login">
                            <div class="check-date">
                                <label for="usuario">Usuario:</label>
                                <input type="text" name="usuario" class="form-control" id="usuario" maxlength="45" placeholder="Ingresa usuario..." autocomplete="off" required>
                                <!-- <i class="icon_user"></i> -->
                            </div>
                            <div class="check-date">
                                <label for="pass">Contraseña:</label>
                                <input type="password" name="password" class="form-control" id="password" autocomplete="off" maxlength="45" placeholder="Ingresa contraseña..." required>
                                <!-- <i class="icon_calendar"></i> -->
                            </div>
                            <div class="select-option">
                                <label for="guest">Idioma:</label>
                                <select name="language" id="language" autocomplete="off">
                                    <option id="es-op" selected="selected" value="es">Español</option>
                                    <option id="en-op" value="en">Inglés</option>
                                    <option id="pt-op" value="pt">Portugués</option>
                                </select>
                            </div>
                            <div class="col">
                                <!-- Simple link -->
                                <a href="https://online.holidaytravel.com.mx/auth/resetpassword">¿Olvidaste tu usuario o contraseña?</a>
                            </div>
                            <!-- <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">1 Room</option>
                                    <option value="">2 Room</option>
                                </select>
                            </div> -->
                            <button type="submit">Entrar</button>
                        </form>
                    </div>
                </div>