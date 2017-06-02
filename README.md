# Stackpath-PHP-SDK
No official SDK for invalidate cache with Stackpath CDN

This SDK only works for invalidate a file in cache.
This is a no official contribution.

# Configuration

Configure in stackpath.php your **Alias**, **Consumer Key** and **Consumer Secret**.

# Example

```
$site_id = 1234;
$stackpath = new stackpath($site_id);
if ($stackpath->deleteFile("/folder/myfile.txt")) {
	echo("Deleted");
} else {
	echo("There was an error");
}

```
