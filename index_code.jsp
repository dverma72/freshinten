<%-- 
    Document   : index_code
    Created on : 16 Nov, 2019, 9:19:30 PM
    Author     : deepak
--%>
<%@page import="java.security.MessageDigest"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.util.Date"%>

<%@page import="java.sql.PreparedStatement"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>

<%
    String login_type= request.getParameter("type");
    String Email_id =request.getParameter("email");
    String pass=request.getParameter("pwd");
    
    if(request.getParameter("login")!= null){
        
        try{
                Class.forName("com.mysql.jdbc.Driver");
        Connection con= DriverManager.getConnection("jdbc:mysql://localhost:3306/dumpit","root","");
       
            
               //----------MD5 Implementation--------------------------------------------------------	
        MessageDigest mdAlgorithm = MessageDigest.getInstance("MD5");
mdAlgorithm.update(pass.getBytes());

byte[] digest = mdAlgorithm.digest();
StringBuffer hexString = new StringBuffer();

for (int i = 0; i < digest.length; i++) {
    pass = Integer.toHexString(0xFF & digest[i]);

    if (pass.length() < 2) {
        pass = "0" + pass;
    }

    hexString.append(pass);
}
    String password=hexString.toString();
    
 //-------------------------------------------------------------------------------   
    
               PreparedStatement ps=con.prepareStatement("select *from  user_login where user_id like '"+Email_id+"' and pass like '"+password+"'");
         ResultSet rs=ps.executeQuery();
            
    if(rs.next()){

        PreparedStatement ps_name=con.prepareStatement("select name from  user_detail where e_mail like '"+Email_id+"'");
            ResultSet rs_name=ps_name.executeQuery();          
            if(rs_name.next()){
             String name= rs_name.getString("name") ;
               session.setAttribute("name",name);
            }
             session.setAttribute("user",Email_id);
            response.sendRedirect("user_home.jsp");
            
        out.print("<script>alert('success');</script>");
    }
    else{
        out.print("<script>alert('Invailid Email_id or password');</script>");
    }
                
        }   catch(Exception ex){
                   out.println("<script>alert('"+ex+"');</script>");
            }
            }

        %>

