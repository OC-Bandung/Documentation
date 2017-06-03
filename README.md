# Documentation

### OCDS Publication


#### Generating MySQL data statistics

**GOALS** 

- Have an accurate estimate of the size of the data for the API, the different end-points and for file download. The size of the data will impact the load on the server.
- Have a clear understanding of how much data is actually filled in at each stage of the contracting process, this is important as part of the Open Contracting Assessment and future recommendations on improving data collection.
- Better design the graphical user interfaces by knowing if most of the fields are blank or available. Fields that are filled in the most need to be given priority in the UI... Otherwise pages might look blank.

**SCRIPTS**

**For statistics about all the tables:** Run the following query on the MySQL database: `SHOW TABLE STATUS`  


**For detailed statistics about each column in each table:** Run the php script in `scripts/mysql-table-stats.php` - make sure to configure the database connection, update the name of the table. The script need to have permissions to write to its current directory in order to save the files.
