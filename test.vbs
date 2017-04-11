Call Main

Function Main
    username = Array("ADMIN","DO1","WrongName","WrongName")
	password = Array("wrongPassword","password","WrongPassword","password")
	Set objFSO=CreateObject("Scripting.FileSystemObject")
	outFile="C:\Users\Prerana K R\Desktop\Temporary\SE\LoginTest.csv"
	Set objFile = objFSO.CreateTextFile(outFile,True)
	objFile.Write "Username" & "," & "Password" & "," & "Successful" & vbCrLf
    Set IE = WScript.CreateObject("InternetExplorer.Application", "IE_")
    IE.Visible = True
    IE.Navigate "http://localhost/proknap/login.php"
    Wait IE
	For i=0 to UBound(username) Step 1
		Wait IE
		With IE.Document
			.getElementsByName("logindrop")(0).Click
			.getElementByID("exampleInputEmail2").value = username(i)
			.getElementByID("exampleInputPassword2").value = password(i)
			.getElementsByName("submit")(0).Click
			Wait IE
			url = IE.LocationUrl
			If strComp(url,"http://localhost/proknap/login.php") <> 0 Then 
				objFile.Write username(i) & "," & password(i) & "," & "Successful" & vbCrLf
				IE.Document.getElementsByName("logout")(0).Click
				Wait IE
			Else
				blah = "Could not log in!"
				objFile.Write username(i) & "," & password(i) & "," & "Failed" & vbCrLf
				Wait IE
			End If
		End With
	Next
	objFile.Close
	IE.Quit
End Function

Sub Wait(IE)
  Do
    WScript.Sleep 500
  Loop While IE.ReadyState < 4 And IE.Busy
End Sub

Set Shell = CreateObject("Shell.Application")

REM Set objFSO=CreateObject("Scripting.FileSystemObject")
REM outFile="C:\Users\Prerana K R\Desktop\Temporary\SE\test.txt"
REM Set objFile = objFSO.CreateTextFile(outFile,True)
REM objFile.Write "test string" & vbCrLf
REM objFile.Close

