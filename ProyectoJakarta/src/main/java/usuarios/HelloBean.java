package usuarios;

import jakarta.inject.Named;
import jakarta.enterprise.context.SessionScoped;
import java.io.Serializable;
import java.util.*;

@Named("helloBean")
@SessionScoped
public class HelloBean implements Serializable {

    private List<Usuario> usuarios;

    public HelloBean() {
        usuarios = new ArrayList<>();
        Map<String, Double> pagos1 = new LinkedHashMap<>();
        pagos1.put("Enero", 25.0); pagos1.put("Febrero", null); pagos1.put("Marzo", 25.0);

        Map<String, Double> pagos2 = new LinkedHashMap<>();
        pagos2.put("Enero", 30.0); pagos2.put("Febrero", 30.0); pagos2.put("Marzo", null);

        usuarios.add(new Usuario("Carlos", "García", "12345678A", "carlos@example.com", 35, pagos1));
        usuarios.add(new Usuario("Ana", "López", "87654321B", "ana@example.com", 28, pagos2));
    }

    public List<Usuario> getUsuarios() {
        return usuarios;
    }
}
