Call Main

Function Main
	Set objFSO=CreateObject("Scripting.FileSystemObject")
	outFile="C:\Users\Prerana K R\Desktop\Temporary\SE\IndentorTest.csv"
	Set objFile = objFSO.CreateTextFile(outFile,True)
	objFile.Write "Username" & "," & "Password" & "," & "Successful" & vbCrLf
    Set IE = WScript.CreateObject("InternetExplorer.Application", "IE_")
    IE.Visible = True
    IE.Navigate "http://localhost/proknap/login.php"
    Wait IE
	Wait IE
	With IE.Document
		.getElementsByName("logindrop")(0).Click
		.getElementByID("exampleInputEmail2").value = "DO1"
		.getElementByID("exampleInputPassword2").value = "password"
		.getElementsByName("submit")(0).Click
		Wait IE
		url = IE.LocationUrl
		If strComp(url,"http://localhost/proknap/login.php") <> 0 Then 
			objFile.Write "E01" & "," & "password" & "," & "Successful" & vbCrLf
			'IE.Document.getElementsByName("logout")(0).Click
			Wait IE
		Else
			blah = "Could not log in!"
			objFile.Write "E01" & "," & "password" & "," & "Failed" & vbCrLf
			Wait IE
		End If
		Wait IE
		REM IE.Document.getElementByID("item").value = "TEST"
		REM IE.Document.getElementByID("qty").value = "TEST"
		REM IE.Document.getElementByID("descr").value = "TEST"
		REM IE.Document.getElementsByName("submit11")(0).Click
		IE.Document.getElementsByName("completed")(0).Click
	End With
	objFile.Close
	Wait IE
	Wait IE
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

