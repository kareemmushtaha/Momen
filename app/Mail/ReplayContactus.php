<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayContactus extends Mailable {
	use Queueable, SerializesModels;

	protected $data;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data = []) {
		//
		$this->data = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */

	public function build() {
		return $this->markdown('admin.emails.replaycontactus')
		            ->subject('الرد على رسالتك : '.$this->data['data']['orginal_msg']->subject.'-'.setting()->sitename_ar)
			->with('data', $this->data);

	}
}
