        <!-- ASK SECTION -->
        <section id="ask">
            <div class="container">
                <div>
                    <h2>Har du spørgsmål?</h2>
                    <p>
                        Hvis du har spørgsmål så hold dig endelig ikke tilbage. Vi vil meget gerne snakke med dig og besvarer alle dine spørgsmål :)
                    </p>
                    <p>
                    Send os en e-mail herunder, så svarer vi så hurtigt vi kan.
                    </p>
                </div>
                <div>
                    <form action="" method="post">
                        <input type="text" name="navn" placeholder="Navn" required>
                        <input type="email" name="email" placeholder="din@mail.her" required>
                        <input id="tlfnr" name="tlfnr" type="tel" pattern="[0-9]{8}"  placeholder="Telefon-nr.">
                        <input type="text" name="emne" placeholder="Emne">
                        <textarea rows="6" name="besked" placeholder="Skriv dit spørgsmål her" required></textarea>
                        <input class="btn" type="submit" name="submit" value="Send">
                    </form>
                </div>
            </div>
        </section>

        <?php    
        
        if (isset($_POST['submit'])){
            $tdm = 'info@tdmhorsens.dk'; // Dette er din mail
            $afsender = $_POST['email']; // Afsenders email
            $navn = $_POST['navn']; // Afsenders navn
            $tlf = $_POST['tlfnr']; // Afsenders telefon-nr.
            $besked = $_POST['besked']; // Afsenders besked
            $emne = "Mail fra website: " . $_POST['emne'];
            $emne2 = "Kopi af din mail til Torsted Dækmontage";
            $besked = "fra: " . $navn . "\nTlf-nr.:" . $tlf . "\n\nEmne: " . $_POST['emne'] . "\nBesked:" . "\n" . $besked;
            $besked2 = "Her er en kopi af din besked " . $navn . "\n\n" . $besked;

            $headers = 'From: '.$navn.' <'.$afsender.'>'. "\r\n" .
                        "MIME-Version: 1.0" . "\r\n" .
                        "Content-Transfer-Encoding: 8bit\r\n".
                        "Content-type: text/plain; charset=\"UTF-8\"" . "\r\n";
            $headers2 = 'From: Torsted Dækmontage <'.$tdm.'>'. "\r\n" .
                        "MIME-Version: 1.0" . "\r\n" .
                        "Content-Transfer-Encoding: 8bit\r\n".
                        "Content-type: text/plain; charset=\"UTF-8\"" . "\r\n";
            mail($tdm,$emne,$besked,$headers);
            mail($afsender,$emne2,$besked2,$headers2); // Sender en kopi af mailen til afsender, som en form for bekræftelse.
        }
        ?>