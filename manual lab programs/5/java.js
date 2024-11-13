importjavax.servlet.*; 
importjavax.servlet.http.*; 
import java.io.*; 
 
public class myForm extends HttpServlet { 
public void doPost(HttpServletRequestrequest,HttpServletResponse response) { 
PrintWriter out; 
int cost=Integer.parseInt(request.getParameter("cost")); 
int quant=Integer.parseInt(request.getParameter("quant")); 
String m=request.getParameter("item"); 
try { 
out=response.getWriter(); 
out.println("<html><head><title>Order</title></head><body>"); 
out.println("Your Order for "+m+" of cost "+cost+" is accepted. Your total Bill is   
                                                                                             Rs."+cost*quant+"."); 
out.println("</body></html>"); 
} 
catch(Exception e){ } 
} 
} 