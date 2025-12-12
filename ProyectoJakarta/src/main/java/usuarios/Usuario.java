package usuarios;

import java.io.Serializable;
import java.util.Map;
import java.util.Objects;

public class Usuario implements Serializable {
    private String nombre;
    private String apellidos;
    private String dni;
    private String email;
    private int edad;
    private Map<String, Double> pagos;

    public Usuario(String nombre, String apellidos, String dni, String email, int edad, Map<String, Double> pagos) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.dni = dni;
        this.email = email;
        this.edad = edad;
        this.pagos = pagos;
    }

    public String getNombre() { return nombre; }
    public String getApellidos() { return apellidos; }
    public String getDni() { return dni; }
    public String getEmail() { return email; }
    public int getEdad() { return edad; }
    public Map<String, Double> getPagos() { return pagos; }

    public double getTotalPagos() {
        return pagos.values().stream().filter(Objects::nonNull).mapToDouble(Double::doubleValue).sum();
    }
}
