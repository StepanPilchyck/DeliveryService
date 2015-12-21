<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
    
<html>
   <head>
        <title>
            Main Menu Items
        </title>
   </head> 
<body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
<xsl:for-each select="menu/item">
  <div style="background-color:white;color:#DE9155;padding:4px;margin-top:5px;">
    <span style="font-weight:bold">
        Item Name: 
        <xsl:value-of select="@name"/>
    </span>
  </div>
</xsl:for-each>
</body>
</html>

</xsl:template>
</xsl:stylesheet>