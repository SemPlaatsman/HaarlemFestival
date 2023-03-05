<form action="submit_order.php" method="post">
  <label for="language">Language:</label>
  <select id="language" name="language">
    <option value="english">English</option>
    <option value="dutch">Dutch</option>
    <option value="chinese">Chinese</option>
  </select><br><br>
  
  <label for="date">Date:</label>
  <input type="date" id="date" name="date"><br><br>

  <label for="time">Time:</label>
  <select id="time" name="time">
    <option value="10:00-13:30">10:00-13:30</option>
    <option value="13:00-15:30">13:00-15:30</option>
    <option value="16:00-18:30">16:00-18:30</option>
  </select><br><br>
  
  <label for="single_tickets">Single Tickets:</label>
  <input type="number" id="single_tickets" name="single_tickets" min="0"><br>0<br>
  
  <label for="family_tickets">Family Tickets:</label>
  <input type="number" id="family_tickets" name="family_tickets" min="0"><br>0<br>
  
  <input type="submit" value="Submit Order">
</form>
