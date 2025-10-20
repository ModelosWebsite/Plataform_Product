<?

namespace App\Mail;

use App\Models\CustomDomain;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DomainProcessingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $domainRecord;

    public function __construct(CustomDomain $domainRecord)
    {
        $this->domainRecord = $domainRecord;
    }

    public function build()
    {
        return $this->subject('Seu domínio está sendo processado')
        ->markdown('emails.domain.processing');
    }
}