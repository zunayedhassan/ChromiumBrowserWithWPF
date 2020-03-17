using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using CefSharp;
using CefSharp.Wpf;

namespace ChromiumBrowserWithWPF
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public static readonly string URL = "https://appiomatic.com/demo/ChromiumBrowserWithWPF/index.php";

        private ChromiumWebBrowser _browser = new ChromiumWebBrowser();

        public MainWindow()
        {
            this.InitializeComponent();

            this._initializeData();
            this._initializeGUI();
            this._initializeEvents();
            this._initializeFinally();
        }

        private void _initializeData()
        {

        }

        private void _initializeGUI()
        {
            this.Root.Children.Add(this._browser);
        }

        private void _initializeEvents()
        {
            this._browser.ConsoleMessage += this._onBrowserConsoleMessage;
            this.SendButton.Click        += this._onSendButtonClicked;
        }


        private void _initializeFinally()
        {
            this.Refresh();
        }

        public void Refresh()
        {
            this._browser.Address = URL;
        }

        public void AddMessage(string text = "")
        {
            Dispatcher.BeginInvoke(new Action(() =>
            {
                this.Output.Text += text + "\r\n";
            }));
        }

        public void SendMessage(string text)
        {
            this._browser.ExecuteScriptAsync("document.querySelector('#Receiver').innerHTML += '" + text + "<br/>';");
        }

        private void _onBrowserConsoleMessage(object sender, CefSharp.ConsoleMessageEventArgs e)
        {
            string message = e.Message.ToString();
            this.AddMessage(message);
        }

        private void _onSendButtonClicked(object sender, RoutedEventArgs e)
        {
            string message = this.AddressTextBox.Text;

            if (message .Length  == 0)
            {
                message = "[!] WARNING: No message is written bu user yet";
            }

            this.SendMessage(message);
        }
    }
}
